<?php include "server.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>registration page</title>
</head>
<body>
<header align='center' style=" background-color: grey; color: white;  border-radius:7px; ">
        <h1>Food Order management system</h1>
    </header>
    <div>
        <div class="form border">
        
            <form action="registration.php" method="post" align="center">
            <?php include('errors.php'); ?>
                <fieldset>
                    <legend align="center">Register new user</legend>
                    <input align="center" type="text" placeholder="Enter Name" name="name" required>   <br>
                    <input align="center" type="text" placeholder="Create Username" name="username" required>   <br>
                    <input align="center" type="number" min=0 max=99999999999 placeholder="Phone Number" name="phone" required>   <br>
                    <input align="center" type="password" placeholder="Enter Password" name="password" required>  <br>
                    <input align="center" type="password" placeholder="Confirm Password" name="confirmpassword" required>  <br>
                    <br><button class="button button5 border" type="submit" name="reg_user">Register</button> 
                </fieldset>
            </form>
        </div>
    </div>
</body>
</html>