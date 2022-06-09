<?php
include 'server.php';
if(@$_SESSION['adminactive'])
{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>admin panel</title>
</head>
<body>
    <div class="main">
    <link rel="stylesheet" href="style.css">
         <header>
        <h1 align = "center">
            Admin Panel
        </h1><hr>
        </header>
        <?php include "adminfunctions.php";
              include "sidenav.php";
              include "topbar.php";
            get_food_data();
        ?>
    </div>
</body>
</html>

<?php
}
else 
{
    echo 'ACCESS DENIED';
}?>