<?php
session_start();
include 'db.php';
include 'sidenav.php';
include 'topbar.php';

if(isset($_SESSION['username']))
{

$username=$_SESSION['username'];

                $query = "SELECT * FROM user_table where user_name = '$username' LIMIT 1";
                
                $result=mysqli_query($conn, $query);
                if($result)
                {
                    $row=mysqli_fetch_assoc($result);
                    $user_id=$row['id'];
                    echo $user_id;
                }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
                <div class= "main">
                <h2 align="center">My Orders</h2><hr>
                
<?php

$query = "SELECT *
FROM user_table
INNER JOIN orders ON Orders.user_id=user_table.id
WHERE user_table.id=$user_id";

$result = mysqli_query($conn,$query);
while($row=mysqli_fetch_assoc($result))
{ ?>
    <table align='center'>
            <tr>
                <th>Order ID</th>
                <th>Foods</th>
                <th>Total</th>
                <th>Payment</th>
                <th>Status</th>
                <th>Date</th>
                <th>address</th>
                <th>Customer Name</th>
            </tr>

            <tr>
               <td> <?php echo $row['id'];?></td>
               <td>
                   <?php
                   $id2=$row['id'];

                   include 'db.php';
                   
                   $query2 = "SELECT *
                   FROM orders_details
                   WHERE orders_details.order_id=$id2";
                   
                   $result2 = mysqli_query($conn,$query2);
                 ?>
                        <table align='center'>
                        <tr>
                                    <th>Food</th>
                                    <th>Price</th>
                                    <th>Quality</th>
                        </tr>
                        <?php
                       while($row2=mysqli_fetch_assoc($result2))
                       {
                           ?>

                                <tr>   
                                        <td><?php echo $row2['food_name'];?></td>
                                        <td><?php echo $row2['price'];?></td>
                                        <td><?php echo $row2['qty'];?></td>
                                </tr>

                           <?php
                       }

                       ?>
                        </table>
               </td>
               <td><?php echo $row['total_price'];?></td>
               <td><?php echo $row['payment_type'];?></td>
               <td><?php echo $row['status'];?></td>
               <td><?php echo $row['date_time'];?></td>
               <td><?php echo $row['address'];?></td>
               <td><?php echo $row['user_name'];?></td>
           </tr>
    </table>



<?php
}
}

else if(isset($_SESSION['adminname']))
{
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
</head>
<body>
    <div class= "main">
    <h2 align="center">Orders List</h2><hr>
    
<?php

$query = "SELECT *
FROM user_table
INNER JOIN orders ON Orders.user_id=user_table.id
WHERE user_table.id";

$result = mysqli_query($conn,$query);
while($row=mysqli_fetch_assoc($result))
{
     $order_id = $row['id'];
     ?>
<table align='center'>
<tr>
    <th>Order ID</th>
    <th>Foods</th>
    <th>Total</th>
    <th>Payment</th>
    <th>Status</th>
    <th>Date</th>
    <th>address</th>
    <th>Customer Name</th>
    <th>Actions</th>
</tr>

<tr>
   <td> <?php echo $row['id'];?></td>
   <td>
       <?php
       $id2=$row['id'];

       include 'db.php';
       
       $query2 = "SELECT *
       FROM orders_details
       WHERE orders_details.order_id=$id2";
       
       $result2 = mysqli_query($conn,$query2);
     ?>
            <table align='center'>
            <tr>
                        <th>Food</th>
                        <th>Price</th>
                        <th>Quality</th>
            </tr>
            <?php
           while($row2=mysqli_fetch_assoc($result2))
           {
               ?>

                    <tr>   
                            <td><?php echo $row2['food_name'];?></td>
                            <td><?php echo $row2['price'];?></td>
                            <td><?php echo $row2['qty'];?></td>
                    </tr>

               <?php
           }

           ?>
            </table>
   </td>
   <td><?php echo $row['total_price'];?></td>
   <td><?php echo $row['payment_type'];?></td>
   <td><?php echo $row['status'];?>
   <a href="editdetails.php?id=<?php echo $order_id?>&edit=orderstatus"> Edit </a>
    </td>
   <td><?php echo $row['date_time'];?></td>
   <td><?php echo $row['address'];?></td>
   <td><?php echo $row['user_name'];?></td>
   <td>
                
                <a href="delete.php?id=<?php echo $order_id?>&del=orderstatus">Delete</a>
   </td>
   
</tr>
</table>



<?php        


        }
    }
?>


</div>
</body>
</html>

