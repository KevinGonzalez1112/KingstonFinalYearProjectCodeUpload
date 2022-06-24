<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Order duplicate logbook or MOT certificate</title>
        <link rel="stylesheet" href="../css/styling.css">
    </head>
    <body>
        <div class = "duplicateDocumentsTopLevel">
            <div class = "headerContainer">
                <header>
                    <a href = "../controller/homePage.php"><img class = "govLogo" src = "../images/gibraltar-gov-logo.png" alt = "Gibraltar Government Logo" /></a>
                </header>
            </div>
            <form class = "duplicateForm" action = "../controller/duplicateDocuments.php" method = "POST"> 
                <div class = "duplicateFormField">
                    <h2> Document Details: </h2>
                    <p> Document Type: </p>    
                    <select name = "documentType">
                        <option value = "-"> - </option>
                        <option value = "registration"> Reigistration Certificate </option>
                        <option value = "roadworthiness"> Roadworthiness Certificate </option>
                    </select>
                </div>
                <div class = "duplicateFormField">
                    <p> Vehicle Registration Number: </p>    
                    <input name = "vehicleRegistrationNumber" required maxlength = "10" type = "text">
                </div>
                <div class = "duplicateFormField">
                    <p> Reason for duplicate: </p>    
                    <input name = "reasonForDuplicate" required maxlength = "30" type = "text">
                </div>
                <div class = "duplicateFormField">
                        <h2> Payment Details: </h2>
                        <p> Card Name: </p>
                        <input name = "cardName" required type = "text">
                    </div>
                    <div class = "duplicateFormField">
                        <p> Card Number: </p>
                        <input name = "cardNumber" required type = "text">
                    </div>
                    <div class = "duplicateFormField">
                        <p> Card Expiry Date: </p>
                        <input name = "cardExpiryDate" required type = "text">
                    </div>
                    <div class = "duplicateFormField">
                        <p> Card Security Code: </p>
                        <input name = "cardSecurityCode" required type = "text">
                    </div>
                <button type = "submit" class = "submitDuplicateButton"> Submit </button>
            </form>
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