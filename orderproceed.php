<?php
session_start();
    $orderinfo=array();
    include 'db.php';
    include 'topbar.php';
    include 'sidenav.php';
    
    $sql ="SELECT * FROM food_table";


    $RESULT = mysqli_query($conn, $sql);
    if($RESULT)
    {
        while($row = mysqli_fetch_assoc($RESULT))
    {
        $id = $row['food_id'];
        $foodname = $row['food_name'];
        $foodprice = $row['food_price'];
        $newid = @$_POST[$foodname];
        $quantity = @$_POST[$id];
        //creating assoc array like (id=>quantity)
        if(isset($newid) && isset($quantity))
        {
            $orderinfo[$newid] = $quantity.' '.$foodname.' '.$foodprice;
        }
    }
    }   
    if($orderinfo==null)
    {
        header('location:showorderlist.php');
    } 

    $_SESSION['orderinfo']=$orderinfo;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orderprocessing</title>
</head>
<body>

    <div class='main'>
    <h2 align="center">Place Order</h2>
        <table align='center'>
            <tr>
                <th>Food Name</th>
                <th>Price</th>
                <th>Quantity</th>
            </tr>
            <?php 
            //initializing variable to calculate sum total
            $sum = 0; 
            foreach($orderinfo as $side=>$direc) 
                {?>
                       <tr>
                           <td><?php echo explode(" ",$direc)[1]; ?></td>
                           <td><?php echo explode(" ",$direc)[2]; ?></td>
                           <td><?php echo explode(" ",$direc)[0]; ?></td>
                       </tr>
                         
                    <?php
                    $sum += totalpricecalc(explode(" ",$direc)[2], explode(" ",$direc)[0]);
                }
                
                        //function calculating total price;
                        function totalpricecalc($price,$quantity)
                        {
                            return $price*$quantity;
                        }
                
                        $_SESSION['sum']=$sum;
                ?>

                <tr><td align = 'center' colspan='3'>Total: Rs <?php echo $sum;?></td></tr>
                <!--Take user address-->
                <form action="saveorder.php" method="post">
            
                <tr><td align = 'center' colspan='3'><input type="text" name="address" placeholder="Enter your address.." required></td></tr>
                    <tr>
                        <td align="center" colspan="3"> <button style="background-color:green; color:white" type="submit" name="orderproceed">Place Order</button> </td>
                    </tr>
                </form>


        </table>
    </div>
</body>
</html>