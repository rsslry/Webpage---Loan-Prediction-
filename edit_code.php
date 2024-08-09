<?php
include('security.php');
include('hashPass.php'); 

if(isset($_POST['updatebtn']))
{  
    $id = $_POST['edit_id'];
    $firstname = $_POST['edit_firstname'];
    $middlename = $_POST['edit_middlename'];
    $lastname = $_POST['edit_lastname'];
    $type = $_POST['edit_type'];
    $username = $_POST['edit_username'];
    $password = $_POST['edit_password'];

    // Hash the password
    $hashedPassword = hashPassword($password);

    $query = "UPDATE register SET firstname=?, middlename=?, lastname=?, type=?, username=?, password=? WHERE id=?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "ssssssi", $firstname, $middlename, $lastname, $type, $username, $hashedPassword, $id);
    $query_run = mysqli_stmt_execute($stmt);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Updated";
        $_SESSION['status_code'] = "success";
        header('Location: register.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT Updated";
        $_SESSION['status_code'] = "error";
        header('Location: register.php'); 
    }
}
?>
