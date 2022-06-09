<?php
    include "server.php";
    if (isset($_SESSION['adminname']))
    {
        session_destroy();
        
    }
    header('location: index.php');
?>