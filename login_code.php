<?php
session_start();
include('security.php');

if(isset($_POST['login_btn']))
{
    $email_login = $_POST['emaill']; 
    $password_login = $_POST['passwordd']; 

    $query = "SELECT * FROM register WHERE username='$email_login' LIMIT 1";
    $query_run = mysqli_query($connection, $query);

    if(mysqli_num_rows($query_run) > 0)
    {
        $row = mysqli_fetch_assoc($query_run);
        $hashed_password = $row['password'];
        
        // Verify the entered password against the hashed password
        if(password_verify($password_login, $hashed_password))
        {
            $_SESSION['username'] = $email_login;
            header('Location: index.php');
        } 
        else
        {
            $_SESSION['status'] = "Email / Password is Invalid";
            header('Location: login.php');
        }
    }
    else
    {
        $_SESSION['status'] = "Email / Password is Invalid";
        header('Location: login.php');
    }
}
?>
