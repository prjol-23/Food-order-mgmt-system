<?php include "server.php";
if(isset($_SESSION['adminname']))//check if admin session is active
{
    header('location:adminpanel.php');
}
if(isset($_SESSION['username']))//check if user session is active
{
    header('location:showorderlist.php');
}
?>
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
    <div>
        
<fieldset>
    <div class="form border">       
            <form action="login.php" method="post" align="center">
            <?php include('errors.php'); ?>
                <fieldset>
                    <legend align="center">Login</legend>
                    <input align="center" type="text" placeholder="Enter Username" name="username" required>   <br>
                    <input align="center" type="password" placeholder="Enter Password" name="password" required>  <br>
                    <br><button class="button button5 border" type="submit" name="login_user">Login</button> 
                </fieldset>
            </form>
        </div>  
</fieldset>
<div align="center">
        <a  href="registration.php" class="button button5 border">Register</a>
        <a  href="adminlogin.php" class="button button5 border">AdminLogin</a>
    </div>
    </div>
</body>
</html>