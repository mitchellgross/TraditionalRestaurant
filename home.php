<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
        <meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="homeCSS.css" />
        <link rel="shortcut icon" type="image/png" href="images/favicon.png"/>
    </head>
    <body>
        <?php include 'header.php'; ?>
        <div id="content">
            <div id="slideshow">
                <div class="slideButton s1"></div>
                <div class="slideButton s2"></div>
                <div class="slideButton s3"></div>
                <img class="slides" src="images/food1.jpg" />
                <img class="slides" src="images/food2.jpg" />
                <img class="slides" src="images/food3.jpg" />
            </div>
            <table id="infoTable">
                <tr>
                    <th><h1>Column One</h1></th>
                    <th><h1>Column Two</h1></th>
                    <th><h1>Column Three</h1></th>
                </tr>
                <tr>
                    <td>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc non suscipit quam. Vivamus vestibulum quam non risus laoreet bibendum. 
                        Donec molestie bibendum nisl, quis maximus risus vehicula sed. Maecenas scelerisque imperdiet laoreet. Maecenas non justo eget enim 
                        malesuada lobortis non vel arcu. Nullam in imperdiet nulla, facilisis malesuada tortor. Fusce gravida lacus tortor, vel scelerisque 
                        elit congue ut. Vestibulum malesuada sapien sed felis porta tincidunt.
                    </td>
                    <td>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc non suscipit quam. Vivamus vestibulum quam non risus laoreet bibendum. 
                        Donec molestie bibendum nisl, quis maximus risus vehicula sed. Maecenas scelerisque imperdiet laoreet. Maecenas non justo eget enim 
                        malesuada lobortis non vel arcu. Nullam in imperdiet nulla, facilisis malesuada tortor. Fusce gravida lacus tortor, vel scelerisque 
                        elit congue ut. Vestibulum malesuada sapien sed felis porta tincidunt.
                    </td>
                    <td>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc non suscipit quam. Vivamus vestibulum quam non risus laoreet bibendum. 
                        Donec molestie bibendum nisl, quis maximus risus vehicula sed. Maecenas scelerisque imperdiet laoreet. Maecenas non justo eget enim 
                        malesuada lobortis non vel arcu. Nullam in imperdiet nulla, facilisis malesuada tortor. Fusce gravida lacus tortor, vel scelerisque 
                        elit congue ut. Vestibulum malesuada sapien sed felis porta tincidunt.
                    </td>
                </tr>
            </table>
        </div>
        <?php include 'footer.php'; ?>
        <script>
            var slideshow = $("#slideshow");
            var slides = $("#slideshow>.slides");
            var slideButton = $(".slideButton");
            var slideDelay = 7000;
            var slideFadeTime = 1000;
            var slideIndex = 0;
            var slideShowInterval = setInterval(function() { SlideShow() }, slideDelay);
            function SlideShow() {
                for (i = 0; i < slides.length; i++){
                    slides.eq(i).fadeOut(slideFadeTime);
                    slideButton.eq(i).css("background-color", "rgba(255, 255, 255, 0.8)");
                }
                slideIndex++;
                if (slideIndex > slides.length){
                    slideIndex = 1;
                }
                slides.eq(slideIndex-1).fadeIn(slideFadeTime);
                slideButton.eq(slideIndex-1).css("background-color", "red");
            }
            slideButton.eq(0).click(function() {
                clearInterval(slideShowInterval)
                slides.eq(0).fadeIn();
                slides.eq(1).fadeOut();
                slides.eq(2).fadeOut();
                slideIndex = 1;
                slideButton.eq(0).css("background-color", "red");
                slideButton.eq(1).css("background-color", "rgba(255, 255, 255, 0.8");
                slideButton.eq(2).css("background-color", "rgba(255, 255, 255, 0.8");
                slideShowInterval = setInterval(function() { SlideShow() }, slideDelay);
            });
            slideButton.eq(1).click(function() {
                clearInterval(slideShowInterval)
                slides.eq(0).fadeOut();
                slides.eq(1).fadeIn();
                slides.eq(2).fadeOut();
                slideIndex = 2;
                slideButton.eq(0).css("background-color", "rgba(255, 255, 255, 0.8");
                slideButton.eq(1).css("background-color", "red");
                slideButton.eq(2).css("background-color", "rgba(255, 255, 255, 0.8");
                slideShowInterval = setInterval(function() { SlideShow() }, slideDelay);
            });
            slideButton.eq(2).click(function() {
                clearInterval(slideShowInterval)
                slides.eq(0).fadeOut();
                slides.eq(1).fadeOut();
                slides.eq(2).fadeIn();
                slideIndex = 0;
                slideButton.eq(0).css("background-color", "rgba(255, 255, 255, 0.8");
                slideButton.eq(1).css("background-color", "rgba(255, 255, 255, 0.8");
                slideButton.eq(2).css("background-color", "red");
                slideShowInterval = setInterval(function() { SlideShow() }, slideDelay);
            });
        </script>
    </body>
</html>