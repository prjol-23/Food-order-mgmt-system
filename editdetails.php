<?php
    include 'server.php';
    include 'topbar.php';
    include 'sidenav.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>editfooddetails</title>
</head>
<body>
    

<?php
if(@$_SESSION['adminactive'])
{
    if ($_GET['edit'] == 'food')
    {
        include 'db.php';
        $id = $_GET['id'];
        
        $sql = 'SELECT * FROM food_table WHERE food_id = '.$id; 
        $result = mysqli_query($conn, $sql);
        if($result)
        {
            $row=mysqli_fetch_assoc($result);
        }

        
        ?>
        <div class='main'>
        <form action="updatedetails.php" method="post" align="center">
        <div>
            <label for="newfoodname">Food Name</label><br>
            <input type="text" name="newfoodname" id="newfoodname" value=<?php echo $row['food_name']?> required><br>
            <label for="newfoodprice">Food Price</label><br>
            <input type="number" step=0.01 min=0 name="newfoodprice" id="newfoodprice" value=<?php echo $row['food_price']?> required><br><br>
            <input type="hidden" name="foodid" value=<?php echo $row['food_id']?>>
            <button type="submit" name="updatefood">Update</button>
        </div>
        </form>
        </div>
<?php
    } 
    else if ($_GET['edit']=='orderstatus')
    {
        include 'db.php';
        $id = $_GET['id'];
        
        $sql = 'SELECT * FROM orders WHERE id = '.$id; 
        $result = mysqli_query($conn, $sql);
        if($result)
        {
            $row=mysqli_fetch_assoc($result);
        }
        $status = $row['status'];
        
        ?>
        <div class='main'>
        <form action="updatedetails.php" method="post" align="center">
        <div>
            <label for="newstatus">Order Status</label><br>
            <input type="text" name="newstatus" value= <?php global $status; echo $status; ?> required><br>
            <input type="hidden" name="id" value=<?php echo $row['id']?>>
            <button type="submit" name="updateorderstatus">Update</button>
        </div>
        </form>
        </div>
    <?php
    } 

    else if ($_GET['edit']=='invoicestatus')
                {
                include 'db.php';
                $id = $_GET['id'];
                
                $sql = 'SELECT * FROM invoice WHERE id = '.$id; 
                $result = mysqli_query($conn, $sql);
                if($result)
                {
                    $row=mysqli_fetch_assoc($result);
                }
                $status = $row['status'];
                
                ?>
                <div class='main'>
                <form action="updatedetails.php" method="post" align="center">
                <div>
                    <label for="newstatus">Invoice Payment Status</label><br>
                    <input type="text" name="newstatus" value= <?php global $status; echo $status; ?> required><br>
                    <input type="hidden" name="id" value=<?php echo $row['id']?>>
                    <button type="submit" name="updateinvoicestatus">Update</button>
                </div>
                </form>
                </div>
            <?php
            } 



}


else
{
    echo 'ACCESS DENIED';
}
?>
</body>
</html>