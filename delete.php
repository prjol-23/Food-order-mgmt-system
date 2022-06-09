<?php
session_start();
if (isset($_SESSION['adminname']))
{   
    if($_GET['del']=='food')
    {
        include 'db.php';
        $id= $_GET['id'];
        $sql = "DELETE FROM food_table WHERE food_id = $id";
        $result =mysqli_query($conn,$sql);

        if ($result)
        {
            header("location: adminpanel.php");
        }

    }

    else if($_GET['del']=='orderstatus')
    {
        include 'db.php';
        $id= $_GET['id'];
        $sql = "DELETE FROM orders WHERE id = $id";
        $result =mysqli_query($conn,$sql);

        if ($result)
        {
            header("location: myorders.php");
        }
    }

    else if($_GET['del']=='invoicestatus')
    {
        include 'db.php';
        $id= $_GET['id'];
        $sql = "DELETE FROM invoice WHERE id = $id";
        $result =mysqli_query($conn,$sql);

        if ($result)
        {
            header("location: invoice.php");
        }
    }
}
?>