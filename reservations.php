<!DOCTYPE html>
<html>
    <head>
        <title>Reservations</title>
        <meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="reservationsCSS.css" />
        <link rel="shortcut icon" type="image/png" href="images/favicon.png"/>
    </head>
    <body>
        <?php include 'header.php'; ?>
        <div id="content">
            <div id="formAndMap">
                <form id="reservationForm">
                    <h1>Reservations</h1>
                    <section>
                        Enter your information to save you and your family a table at your nearest local Quintin's Cuisine. <br>
                    </section>
                    Name: <input type="text" class="formInput name"></input><br><br>
                    Party Size: <input type="number" class="formInput size"></input><br><br>
                    <div id="reservPrice">
                        <script>
                            var reservSize = $(".size");
                            $("#reservPrice").text("Price Estimate: $" + reservSize.val() * 23);
                            reservSize.keyup(function() {
                                console.log(reservSize.val());
                                $("#reservPrice").text("Price Estimate: $" + reservSize.val() * 23);
                                if (reservSize.val() == "" || reservSize.val() < 0) {
                                    $("#reservPrice").text("Price Estimate: $" + 0);
                                } else
                                if (reservSize.val() > 10) {
                                    $("#reservPrice").text("Notice: Our restaurant only supports parties of 10 members of less.");
                                }
                            });
                        </script>
                    </div><br>
                    <span style="color: red;"> Demonstration purposes only; information is <i>not</i> saved!</span><br>
                    <input type="submit" value="Submit Reservation"></input>
                </form>
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d62542.88772024451!2d92.23858304635287!3d11.556841331104186!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30863a35c7c1b4e1%3A0x22f2e4fd1e2aa9c5!2sNorth+Sentinel+Island!5e0!3m2!1sen!2sus!4v1520887818158" 
                    width="500" 
                    height="500" 
                    frameborder="0" 
                    style="border:0" 
                allowfullscreen>
                </iframe>
            </div>
        </div>
        <?php include 'footer.php'; ?>
    </body>
</html>