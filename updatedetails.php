<?php
if (isset($_POST['updatefood']))
        {
        include "db.php";    
        $foodname = mysqli_real_escape_string($conn, $_POST['newfoodname']);
        $foodprice = mysqli_real_escape_string($conn, $_POST['newfoodprice']);
        $id = mysqli_real_escape_string($conn, $_POST['foodid']);
       
        $sql = "UPDATE food_table SET food_name = '$foodname', food_price = '$foodprice' WHERE food_id = $id"; 
        $result = mysqli_query($conn, $sql);
        if($result)
        {
            header('location: adminpanel.php');
        }
  	    
        }
else if(isset($_POST['updateorderstatus']))
        {
        include "db.php";    

        $id= mysqli_real_escape_string($conn, $_POST["id"]);
        $status=mysqli_real_escape_string($conn, $_POST["newstatus"]);
       
        $sql = "UPDATE orders SET status = '$status' WHERE id = $id"; 
        $result = mysqli_query($conn, $sql);
        if($result)
        {
            header('location: myorders.php');
        }
        }

else if(isset($_POST['updateinvoicestatus']))
        {
        include "db.php";    

        $id= mysqli_real_escape_string($conn, $_POST["id"]);
        $status=mysqli_real_escape_string($conn, $_POST["newstatus"]);
       
        $sql = "UPDATE invoice SET status = '$status' WHERE id = $id"; 
        $result = mysqli_query($conn, $sql);
        if($result)
        {
            header('location: invoice.php');
        }
        }
?>