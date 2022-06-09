<?php
  session_start();
    class order
    {
        function __construct($address,$payment,$total_price,$array)
        {
            $this->saveorder($address,$payment,$total_price,$array);
        }

        function saveorder($address,$payment,$total_price,$array)
        {
            include 'db.php';
          
            if (isset($_SESSION['username']))
            {
                $username=$_SESSION['username'];

                $query = "SELECT * FROM user_table where user_name = '$username' LIMIT 1";
                
                $result=mysqli_query($conn, $query);
                if($result)
                {
                    $row=mysqli_fetch_assoc($result);
                    $user_id=$row['id'];
                }

                $query = "INSERT INTO orders (user_id, address, payment_type, total_price) 
                          VALUES('$user_id', '$address', '$payment', '$total_price')";

                if (mysqli_query($conn, $query)) 
                {
                    $order_id = mysqli_insert_id($conn); //get newly created order id

                    foreach($array as $side=>$direc) 
                    {
                                $food_id = $side; 
                                $food_name = explode(" ",$direc)[1];
                                $food_price = explode(" ",$direc)[2];
                                $quantity = explode(" ",$direc)[0];
                                    
                            
                            $query = "INSERT INTO orders_details (order_id, food_id, food_name, qty, price) 
                                    VALUES('$order_id', '$food_id','$food_name', '$quantity', '$food_price')";

                            if(mysqli_query($conn, $query))
                            {
                                header('location: myorders.php');
                            }
                    }

                            $date = date('Y-m-d', strtotime("+5 day"));
                            $query = "INSERT INTO invoice (user_id, invoice_due_date, order_id) 
                            VALUES('$user_id', '$date', '$order_id')";

                            mysqli_query($conn, $query);
                }   
                else 
                {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                
            }
          }
        }

if(isset($_SESSION['username']))
{
$array = $_SESSION['orderinfo']; //in format foodid=>quantity foodname foodprice
$address = $_POST['address'];
$total_price = $_SESSION['sum'];

new order($address,"Cash On Delivery",$total_price,$array);
}
?>