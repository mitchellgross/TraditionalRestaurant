<div id="header">
    <span id="title">Quintin's Cuisine</span>
    <br><sup id="subTitle">The best food in all of Castle Fictoria.</sup>
    <div id="navBar">
        <a class="links" href="home.php">Home</a>
        <a class="links" id="dropdown" href="menu.php">Menu</a>
        <a class="links" href="reviews.php">Reviews</a>
        <a class="links" href="reservations.php">Reservations</a>
        <a class="links" href="staff.php">Staff</a>
        <form class="dropList" action="menu.php" method="post">
            <input type="submit" name="food" value="Breakfast"></input> <!-- Goto the menu; filter results to only breakfast (maybe using POST) -->
            <input type="submit" name="food" value="Dinner"></input>
            <input type="submit" name="food" value="Desert"></input>
            <input type="submit" name="food" value="Drinks"></input>
        </form>
    </div>
</div>
<script>
    CheckPage();

    function CheckPage(){
        var i;
        var x = document.getElementsByClassName("links");

        for (i = 0; i < x.length; i++) {
            if (x[i].href.substring(location.pathname.lastIndexOf("/") + 30) == window.location.pathname.substring(location.pathname.lastIndexOf("/") + 1)){
                x[i].setAttribute("style","border-bottom: 2px solid red;");
            } else {
                x[i].setAttribute("style","border-bottom: 2px solid rgba(0, 0, 0, 0);"); //creates an invisible border to ensure all links stay the same size
            }
        }
    }
</script>
<script>
    //Handles the drop-down menu
    var dropdown = $("#dropdown");
    var dropList = $(".dropList");
    var slideSpeed = 100;

    $(document).ready(function(){
        dropdown.mouseenter(function(){
            dropList.slideDown(slideSpeed);
        });
        dropdown.mouseleave(function(){
            setTimeout(function (){
                if (dropList.is(":hover")){
                    dropList.css("display", "block");
                } else {
                    dropList.slideUp(slideSpeed);
                }
            }, slideSpeed);
        });
        dropList.mouseleave(function(){
            setTimeout(function (){
                if (dropdown.is(":hover")){
                    dropList.css("display", "block");
                } else {
                    dropList.slideUp(slideSpeed);
                }
            }, slideSpeed);
        });
    });
</script>