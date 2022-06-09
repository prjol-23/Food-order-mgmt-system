<?php include "server.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="sidenav border">
        <?php
        if (isset($_SESSION['username']))
        { ?>
            <a href="showorderlist.php">Order Food</a>
            <hr>
            <a href="myorders.php">My Orders</a>
            <hr>
            <a href="invoice.php">My Invoices</a>
        <?php } 
        if (isset($_SESSION['adminname']))
        {
            ?>
            <a href="myorders.php">Orders</a>
            <hr>
            <a href="adminpanel.php">Food</a>
            <hr>
            <a href="invoice.php">Invoice</a>
            <hr>
    <?php 
    }?>
    </div>
</body>
</html>