<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Log In Page </title>
        <link rel="stylesheet" href="../css/styling.css">
    </head>
    <body>
        <div class = "logInScreenTopLevel">
            <header class = "headerContainer">
                <img class = "govLogo" src = "../images/gibraltar-gov-logo.png" alt = "Gibraltar Government Logo" />
            </header>
            <form action = "../controller/logIn.php" method = "POST" class = "logInFormContainer">
                <h1 class = "logInHeader"> CUSTOMER LOG IN </h1>
                <h3 class = "logInIdLabel"> Identification Number: </h3>
                <input class = "logInIdInput" name = "userId" required type = "text">
                <h3 class = "logInPasswordLabel"> Password: </h3>
                <input class = "logInPasswordInput" name = "passwordInput" required type = "password">
                </br></br>
                <button class = "logInButton" type = "submit"> Log In </button>
            </form>
        </div>
    </body>
</html>


