<?php
    include "server.php";
    include "sidenav.php";
    include "topbar.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class = 'main' >
    <h2 align="center">Food list</h2>

    <table align = "center">
           <tr>
            <th>Food Name</th>
            <th>Price(RS)</th>
            <th align ="center">check</th>
            <th>Quantity</th>
            </tr>
    <form id= "sectionForm" action="orderproceed.php" method="post">
    <?php 
        include 'db.php';
        $sql ="SELECT * FROM food_table";

    
    $RESULT = mysqli_query($conn, $sql);
    if($RESULT)
    {
        while($row = mysqli_fetch_assoc($RESULT))
        {
            $id = $row['food_id'];
            $foodname = $row['food_name'];
            $foodprice = $row['food_price'];
            ?>

           <tr>
               <td> <?php echo $foodname; ?></td>
               <td><?php echo $foodprice; ?></td>
               <td><input type="checkbox" name="<?php echo $foodname?>" id="<?php echo $id?>" value="<?php echo $id?>"></td>
               <td><input type="number" min=1 name="<?php echo $id?>" id="<?php echo $id?>" value="1" required></td>
           </tr>
           
   
            
        
    <?php
    }
    }?>

    <tr>
       <td align="center" colspan="4"> <button style="background-color:green; color:white" type="submit" name="order">Proceed</button> </td>
    </tr>

</form>
</table>
    
    </div>    
</body>
</html>