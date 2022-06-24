<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home Page</title>
        <link rel="stylesheet" href="../css/styling.css">
    </head>
    <body>
        <div class = "profileTopLevel">
            <div class = "headerContainer">
                <header>
                    <a href = "../controller/homePage.php"><img class = "govLogo" src = "../images/gibraltar-gov-logo.png" alt = "Gibraltar Government Logo" /></a>
                </header>
            </div>
            <div class = "userImage">
                <img src = "https://st.depositphotos.com/1052233/2815/v/600/depositphotos_28158459-stock-illustration-male-default-profile-picture.jpg" alt = "Profile Picture">
            </div>
            <div class = "userProfile">
                <h3>National ID Number: <?= $_SESSION["national_id_number"] ?></h3>
                <h3>Name: <?= $_SESSION["first_name"] ?></h3>
                <h3>Surname: <?= $_SESSION["surname"] ?></h3>
                <h3>Date Of Birth: <?= $_SESSION["date_of_birth"] ?></h3>
                <h3>Place Of Birth: <?= $_SESSION["place_of_birth"] ?></h3>
                <h3>Address: <?= $_SESSION["address"] ?></h3>
                <h3>Email Address: <?= $_SESSION["email_address"] ?></h3>
                <h3>Home Telephone: <?= $_SESSION["home_telephone"] ?></h3>
                <h3>Work Telephone: <?= $_SESSION["work_telephone"] ?></h3>
            </div>
            <div class = "socialsContainer">
                <h2 class = "socialsHeader"> Find us on social media *ADD IN SOCIAL BUTTONS IN THIS BAR*</h2>
            </div>
            <div class = "footerContainer">
                <h2 class = "footerHeader"> Information and FAQ's: </h2>
                <a class = "infoAndFaqsA" href = "../view/feesTable_view.php"> Fees Table </a>
            </div>
        </div>
    </body>

</html>