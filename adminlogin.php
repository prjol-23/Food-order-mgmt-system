<?php include "server.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>login page</title>
</head>
<body>
<header align='center' style=" background-color: grey; color: white;  border-radius:7px; ">
        <h1>Food Order management system</h1>
    </header>
    <div>
        <div class="form border">
        
            <form action="login.php" method="post" align="center">
            <?php include('errors.php'); ?>
                <fieldset>
                    <legend align="center">Administrator Login</legend>
                    <input align="center" type="text" placeholder="Enter admin Username" name="username" required>   <br>
                    <input align="center" type="password" placeholder="Enter Password" name="password" required>  <br>
                    <br><button class="button button5 border" type="submit" name="login_admin">Login</button> 
                </fieldset>
            </form>
        </div>
        <div align= "center">  
        <a href="addadmin.php" class="button button5 border">Register</a>
    </div>
    </div>
</body>
</html>