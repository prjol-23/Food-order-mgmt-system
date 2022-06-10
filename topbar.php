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
    <div class="topbar border">
        
        <?php if (@$_SESSION['username'] != null) 
        {?>
            <a href="logout.php">logout</a>
            <a style='cursor: not-allowed;' > You are Logged in as <?php echo @$_SESSION['username']; ?></a>

        <?php
        } 
           else if (isset($_SESSION['adminname']))
            {?>
            <a href="adminlogout.php">logout</a>
            <a style='cursor: not-allowed;'> You are Logged in as administrator <?php echo @$_SESSION['adminname']; ?></a>
        <?php 
        }
          else
        { ?>
            <a href="index.php">login</a>
            <a style='cursor: not-allowed;'> You are Not Logged In.</a>
            
       <?php }?>
    </div>
</body>
</html>