<?php
    function get_food_data()
    {   
        ?>
        <form action="adminpanel.php" method="post" align="center">
        <div>
            <label for="foodname">Food Name</label><br>
            <input type="text" name="foodname" id="foodname" required><br>
            <label for="foodprice">Food Price</label><br>
            <input type="number" step=0.01 min=0 name="foodprice" id="foodprice" required><br><br>
            <input type="submit" name="addfood" value="Add Food">
        </div>
        </form>
        <?php 
               if (isset($_POST['addfood']))
                    {
                        add_food();
                    }
        ?>
        <hr>
        <h2 align="center">Food list</h2>
        <hr>

        <table align="center">
            <tr>
            <th>Food id</th>
            <th>Food</th>
            <th>Price</th>
            <th>Actions</th>
            </tr>
            <tr>
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
            <td><?php echo $id ?></td>
            <td><?php echo $foodname ?></td>
            <td><?php echo $foodprice ?></td>
            <td>
                <a href="editdetails.php?id=<?php echo $id?>&edit=food"> Edit </a>
                <a href="delete.php?id=<?php echo $id?>&del=food">Del</a>
            </td>
        </tr>
                    <?php
                }
            }
            ?>
        </tr>
    </table>
        <?php
    }

    function add_food()
    {
        include "db.php";

        $foodname = mysqli_real_escape_string($conn, $_POST['foodname']);
        $foodprice = mysqli_real_escape_string($conn, $_POST['foodprice']);
        $foodname = str_replace(" ","_",$foodname);

  	    $query = "INSERT INTO food_table (food_name, food_price) 
  			  VALUES('$foodname', '$foodprice')";
  	    $RESULT=mysqli_query($conn, $query);
          if ($RESULT)
            {
                header('location: adminPanel.php');
            }
            else
            {
                echo "Error: ". $sql ."<br>" . mysqli_error($conn);
            }
        
    }
?>