<?php

include 'db.php';
include 'sidenav.php';
include 'topbar.php';

@session_start();

if(isset($_SESSION['username']))
{

            $username=$_SESSION['username'];

                            $query = "SELECT * FROM user_table where user_name = '$username' LIMIT 1";
                            
                            $result=mysqli_query($conn, $query);
                            if($result)
                            {
                                $row=mysqli_fetch_assoc($result);
                                $user_id=$row['id'];
                            }

            $query = "SELECT *
            FROM orders
            INNER JOIN invoice ON orders.id=invoice.order_id
            WHERE invoice.user_id=$user_id";

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

            <?php
            $result = mysqli_query($conn,$query);
            while($row=mysqli_fetch_assoc($result))
            {

                $invoice_id = $row['id'];
                $orderid = $row['order_id']; 
                ?>

            <div class='main'>
            <table align='center'>
            <tr>
                <th>Invoice ID</th>
                <th>Foods</th>
                <th>Invoice Date</th>
                <th>Order ID</th>
                <th>Total</th>
                <th>Due Date</th>
                <th>Customer name</th>
                <th>Payment Status</th>
                <th>Actions</th>
            </tr>

            <tr>
            <td> <?php echo $invoice_id?></td>
            <td>
                <?php
                $id2=$row['order_id'];

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
            <td><?php echo $row['invoice_date'];?></td>
            <td><?php echo $orderid;?></td>
            <td><?php echo $row['total_price'];?>
                </td>
            <td><?php echo $row['invoice_due_date'];?></td>
            <td><?php echo $_SESSION['username'];?></td>
            <td><?php echo $row['status'];?></td>
            <td>
                            
            <a href="invoicetemplate.php?id=<?php echo $invoice_id;?>&pstatus=<?php echo $row['status'];?>&oid=<?php echo $orderid;?>&tot=<?php echo $row['total_price'];?>&uid=<?php echo $row['user_id']?>&dc=<?php echo $row['invoice_date'];?>&due=<?php echo $row['invoice_due_date'];?>">SEE INVOICE</a>
            </td>
            
            </tr>
            </table>
            </div>



            </body>
            </html>

<?php 
}
}

else if(isset($_SESSION['adminname']))
{

$query = "SELECT *
            FROM orders
            INNER JOIN invoice ON orders.id=invoice.order_id";

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

<?php
$result = mysqli_query($conn,$query);
while($row=mysqli_fetch_assoc($result))
{

    $invoice_id = $row['id'];
    $orderid = $row['order_id']; 
    ?>

<div class='main'>
<table align='center'>
<tr>
    <th>Invoice ID</th>
    <th>Foods</th>
    <th>Invoice Date</th>
    <th>Order ID</th>
    <th>Total</th>
    <th>Due Date</th>
    <th>userID</th>
    <th>Payment Status</th>
    <th>Actions</th>
</tr>

<tr>
<td> <?php echo $invoice_id?></td>
<td>
    <?php
    $id2=$row['order_id'];

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
<td><?php echo $row['invoice_date'];?></td>
<td><?php echo $orderid;?></td>
<td><?php echo $row['total_price'];?>
    </td>
<td><?php echo $row['invoice_due_date'];?></td>
<td><?php echo $row['user_id']?></td>
<td><?php echo $row['status'];?>
<a href="editdetails.php?id=<?php echo $invoice_id?>&edit=invoicestatus"> Edit </a>

</td>
<td>
                
<a href="invoicetemplate.php?id=<?php echo $invoice_id;?>&pstatus=<?php echo $row['status'];?>&oid=<?php echo $orderid;?>&tot=<?php echo $row['total_price'];?>&uid=<?php echo $row['user_id']?>&dc=<?php echo $row['invoice_date'];?>&due=<?php echo $row['invoice_due_date'];?>">SEE INVOICE</a>
<a href="delete.php?id=<?php echo $invoice_id;?>&del=invoicestatus">Delete Invoice</a>
</td>

</tr>
</table>
</div>



</body>
</html>



<?php        


        }
    } 
    else
    {
        header("location:index.php");
    }
?>