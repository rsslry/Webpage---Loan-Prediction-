
<?php
session_start(); // Start or resume the session

// Unset all session variables
$_SESSION = array();

// Destroy the session
if(isset($_POST['logout_btn']))
{
    session_destroy();
    unset($_SESSION['username']);
    header('Location: login.php');
}

// Redirect the user to the login page or any other appropriate page
header("Location: login.php");
exit(); // Ensure that no further code is executed after redirection
?>
