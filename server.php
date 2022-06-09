<?php
    include "db.php";
            
    /*if (@$_POST['password'] !=null && @$_POST['password'] == @$_POST['confirmpassword'])
        {
            echo "password is". @$_POST['password'];
        }*/

?>

<?php

@session_start();
// initializing variables
$username = "";
$errors = array(); 

//login admin
if (isset($_POST['login_admin'])) 
{
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
  
    $password = md5($password);
    $query = "SELECT * FROM sysadmins WHERE admin_name='$username' AND password='$password'";
    $results = mysqli_query($conn, $query);
    if (mysqli_num_rows($results) == 1) 
    {
        $_SESSION['adminname'] = $username;
        $_SESSION['adminactive'] = true;
        header('location: adminPanel.php');
    }
    else 
    {
            array_push($errors, "Wrong username/password combination");
    }
}


//add admin
if (isset($_POST['reg_admin']))
{
  // receive all input values from the form
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password_1 = mysqli_real_escape_string($conn, $_POST['password']);
  $password_2 = mysqli_real_escape_string($conn, $_POST['confirmpassword']);

  // see if the provided passwords match
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // checking database if username already exists
  $user_check_query = "SELECT * FROM sysadmins WHERE admin_name ='$username' LIMIT 1";
  $result = mysqli_query($conn, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) 
  { // if user exists
    if ($user['admin_name'] === $username) {
      array_push($errors, "Username already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypting the password using md5 hash

  	$query = "INSERT INTO sysadmins (admin_name, password) 
  			  VALUES('$username', '$password')";
  	mysqli_query($conn, $query);
  	$_SESSION['adminname'] = $username;
  	$_SESSION['adminactive'] = true;
      header('location: adminPanel.php');
  }
}

// LOGIN USER
if (isset($_POST['login_user'])) 
{
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
  
    $password = md5($password);
    $query = "SELECT * FROM user_table WHERE user_name='$username' AND password='$password'";
    $results = mysqli_query($conn, $query);
    if (mysqli_num_rows($results) == 1) 
    {
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        header('location: showorderlist.php');
    }
    else 
    {
            array_push($errors, "Wrong username/password combination");
    }
}


// REGISTER USER
if (isset($_POST['reg_user']))
{
  // receive all input values from the form
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $phone = mysqli_real_escape_string($conn, $_POST['phone']);
  $password_1 = mysqli_real_escape_string($conn, $_POST['password']);
  $password_2 = mysqli_real_escape_string($conn, $_POST['confirmpassword']);

  // see if the provided passwords match
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // checking database if username already exists
  $user_check_query = "SELECT * FROM user_table WHERE user_name ='$username' LIMIT 1";
  $result = mysqli_query($conn, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) 
  { // if user exists
    if ($user['user_name'] === $username) {
      array_push($errors, "Username already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypting the password using md5 hash

  	$query = "INSERT INTO user_table (user_name, name, password, contact) 
  			  VALUES('$username', '$name', '$password', '$phone')";
  	mysqli_query($conn, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
      echo $_SESSION['username'];
      header('location: showorderlist.php');
  }
}
?>