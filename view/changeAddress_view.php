<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Change registered address</title>
        <link rel="stylesheet" href="../css/styling.css">
    </head>
    <body>
        <div class = "changeAddressTopLevel">
            <div class = "headerContainer">
                <header>
                    <a href = "../controller/homePage.php"><img class = "govLogo" src = "../images/gibraltar-gov-logo.png" alt = "Gibraltar Government Logo" /></a>
                </header>
            </div>
        </div>
        <form class = "changeAddressForm" action = "../controller/changeAddress.php" method = "POST">
            <div class = "addressFormField">
                <p> New Address: </p>    
                <input name = "address" required maxlength = "255" type = "text">
            </div>
            <button type = "submit" class = "submitAddressButton"> Submit </button>
        </form>
        <div class = "socialsContainer">
            <h2 class = "socialsHeader"> Find us on social media *ADD IN SOCIAL BUTTONS IN THIS BAR*</h2>
        </div>
        <div class = "footerContainer">
            <h2 class = "footerHeader"> Information and FAQ's: </h2>
            <a class = "infoAndFaqsA" href = "../view/feesTable_view.php"> Fees Table </a>
        </div>
    </body>

</html>