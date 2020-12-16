<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8" />
    <meta name="description" content="OpenSWPlatform Project" />
    <meta name="keywords" content="pet manageer">
    <title>Team 09: Pet Management System</title>
    <link rel="stylesheet" href="styles.css" />
    </head>
    <body>


        <nav id= "topnav">
          <div class = 'login-container'>
            <?php
                if(isset($_SESSION['userId'])){
                    echo '<form action = "main.php"><button type= "submit">Home</button></form>
                    <form action = "settings.php"><button type= "submit">My Account</button></form>
                    <form action = "includes/logout.inc.php" method = "post">
                    <button type = "submit" name = "logout-submit">Logout</button>
                    </form>';
                }
                else {
                    echo '<form action = "main.php"><button type= "submit">Home</button></form>
                    <form action = "signup.php"><button type = "submit">Sign Up</button></form>
                    <form action = "includes/login.inc.php" method = "post">
                    <button type = "submit" name = "login-submit">Login</button>
                    <input type = "password" name = "pwd" placeholder="Password">
                    <input type = "text" name = "mailuid" placeholder="Username">
                    
                    </form>';
                    
                }
            ?>
            <div>
          </nav>
        </header>
    </body>
</html>

