<?php 
    session_start();
    include ('database/dbconfig.php');

    if(!isset($_SESSION['username']) || empty($_SESSION['username']))
    {
        header("Location: login.php");
    
    exit();

    }

    
    
?>