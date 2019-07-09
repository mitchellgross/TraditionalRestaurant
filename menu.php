<!DOCTYPE html>
<html>
    <head>
        <title>Menu</title>
        <meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="menuCSS.css" />
        <link rel="shortcut icon" type="image/png" href="images/favicon.png"/>
    </head>
    <body>
        <?php include 'header.php'; ?>
        <div id="content">
            <div id="menuTitle">Full Menu:</div>
            <input type="text" id="menuSearch" placeholder="Search Menu"></input>
            <div id="menuContainer">
            </div>
        </div>
        <?php include 'footer.php'; ?>
    </body>
    <script>
        var breakfasts = [
            ["Pancakes","$4.99","Two pancakes covered in syrup.","images/pancakes.jpg"], //NAME, PRICE, DESCRIPTION, IMAGE
            ["Omelette","$5.99","One giant 6-egg omelette!","images/omelette.jpg"],
            ["Bacon","$1.99","Four pieces of bacon.","images/bacon.jpg"],
            ["Toast","$1.99","Two pieces of toast.","images/toast.jpg"]
        ];
        var dinners = [
            ["Hamburger","$5.99","A hamburger with normal hamburger stuff.","images/hamburger.jpg"],
            ["Pasta","$4.99","Pasta with Alfredo sauce.","images/pasta.jpg"],
            ["Pizza","$7.99","A whole pepperoni pizza!","images/pizza.jpg"]
        ];
        var deserts = [
            ["Chocolate Cake","$3.99","A slice of chocolate cake.","images/cake.jpg"],
            ["Apple Pie","$3.99","A slice of apple pie.","images/pie.jpg"],
            ["Banana Split","$2.99","A bowel of ice cream and bananas topped with chocolate sauce, nuts, whipped cream, and a cherry!","images/bananasplit.jpg"]
        ];
        var drinks = [
            ["Orange Juice","$1.99","Made with freshly-squeezed oranges.","images/orangejuice.jpg"],
            ["Apple Juice","$1.99","100% apple juice.","images/applejuice.jpg"],
            ["Lemonade","$1.99","Made with freshly-squeezed lemons with added sugar.","images/lemonade.jpg"],
            ["Soda","$2.99","Your choice of any soda flavor! We've got em' all!","images/soda.jpg"],
            ["Water","$0.99","It's water.","images/water.jpg"]
        ];
        var fullMenu = breakfasts.concat(dinners, deserts, drinks);
        var menuContainer = $("#menuContainer");
        var menuTitle = $("#menuTitle");

        <?php if (!isset($_POST['food'])) { ?>
            menuTitle.text("Full Menu:");
            for (i = 0; i < fullMenu.length; i++) {
                menuContainer.append("<div class='menuItem'><div id='itemTitle'>" + fullMenu[i][0] + "</div><img src='" + fullMenu[i][3] + "' /><div id='itemPrice'>" + fullMenu[i][1] + "</div><div id='itemDesc'>" + fullMenu[i][2] + "</div></div>");
            }
        <?php } ?>
        <?php if ($_POST['food'] == "Breakfast") { ?>
            menuTitle.text("Breakfasts:");
            for (i = 0; i < breakfasts.length; i++) {
                menuContainer.append("<div class='menuItem'><div id='itemTitle'>" + breakfasts[i][0] + "</div><img src='" + breakfasts[i][3] + "' /><div id='itemPrice'>" + breakfasts[i][1] + "</div><div id='itemDesc'>" + breakfasts[i][2] + "</div></div>");
            }
        <?php } ?>
        <?php if ($_POST['food'] == "Dinner") { ?>
            menuTitle.text("Dinners:");
            for (i = 0; i < dinners.length; i++) {
                menuContainer.append("<div class='menuItem'><div id='itemTitle'>" + dinners[i][0] + "</div><img src='" + dinners[i][3] + "' /><div id='itemPrice'>" + dinners[i][1] + "</div><div id='itemDesc'>" + dinners[i][2] + "</div></div>");
            }
        <?php } ?>
        <?php if ($_POST['food'] == "Desert") { ?>
            menuTitle.text("Deserts:");
            for (i = 0; i < deserts.length; i++) {
                menuContainer.append("<div class='menuItem'><div id='itemTitle'>" + deserts[i][0] + "</div><img src='" + deserts[i][3] + "' /><div id='itemPrice'>" + deserts[i][1] + "</div><div id='itemDesc'>" + deserts[i][2] + "</div></div>");
            }
        <?php } ?>
        <?php if ($_POST['food'] == "Drinks") { ?>
            menuTitle.text("Drinks:");
            for (i = 0; i < drinks.length; i++) {
                menuContainer.append("<div class='menuItem'><div id='itemTitle'>" + drinks[i][0] + "</div><img src='" + drinks[i][3] + "' /><div id='itemPrice'>" + drinks[i][1] + "</div><div id='itemDesc'>" + drinks[i][2] + "</div></div>");
            }
        <?php } ?>
        
        var menuSearch = $("#menuSearch");
        var menuItems = $("#menuContainer>.menuItem");
        var menuItemTitles = $("#menuContainer>.menuItem>#itemTitle").map(function(){
            return $.trim($(this).text());
        }).get();
        console.log(menuItemTitles);

        menuSearch.keyup(function() {
            console.log("KEY PRESSED");
            for (i = 0; i < fullMenu.length; i++) {
                if (fullMenu[i][0].toUpperCase().includes(menuSearch.val().toUpperCase())){ //strings converted to uppercase to make search queries case insensitive
                    for (j = 0; j < menuItemTitles.length; j++){
                        if (!menuItemTitles[j].toUpperCase().includes(menuSearch.val().toUpperCase())){
                            menuItems.eq(j).css("display", "none");
                        } else 
                        if (menuItemTitles[j].toUpperCase().includes(menuSearch.val().toUpperCase())){
                            menuItems.eq(j).css("display", "block");
                        }
                    }
                } else
                if (!fullMenu[i][0].toUpperCase().includes(menuSearch.val().toUpperCase())){ //prevents a bug where adding to a matching query will continue to display items
                    for (j = 0; j < menuItemTitles.length; j++){
                        if (!menuItemTitles[j].toUpperCase().includes(menuSearch.val().toUpperCase())){
                            menuItems.eq(j).css("display", "none");
                        }
                    }
                }
            }
        });
    </script>
</html>