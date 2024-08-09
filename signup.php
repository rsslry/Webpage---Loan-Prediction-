<?php
include('security.php');
include('hashPass.php'); // Include the file containing password hashing functions

if(isset($_POST['registerbtn']))
{  
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $type = $_POST['type'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];

    $email_query = "SELECT * FROM register WHERE username='$username' ";
    $email_query_run = mysqli_query($connection, $email_query);
    if(mysqli_num_rows($email_query_run) > 0)
    {
        $_SESSION['status'] = "Username Already Taken. Please Try Another one.";
        $_SESSION['status_code'] = "error";
        header('Location: login.php');  
    }
    else
    {
        if($password === $cpassword)
        {
            // Hash the password using bcrypt
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            $query = "INSERT INTO register (firstname, middlename, lastname, type, username, password) VALUES ('$firstname','$middlename','$lastname','$type','$username','$hashedPassword')";

            $query_run = mysqli_query($connection, $query);
            
            if($query_run)
            {
                // echo "Saved";
                $_SESSION['status'] = "Admin Profile Added";
                $_SESSION['status_code'] = "success";
                header('Location: login.php');
            }
            else 
            {
                $_SESSION['status'] = "Admin Profile Not Added";
                $_SESSION['status_code'] = "error";
                header('Location: login.php');  
            }
        }
        else 
        {
            $_SESSION['status'] = "Password and Confirm Password Does Not Match";
            $_SESSION['status_code'] = "warning";
            header('Location: login.php');  
        }
    }

}
?>
