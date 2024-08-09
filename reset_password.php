<?php
include('session.php');
include('security.php');

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    

    if($connection) {
        // Default password
        $default_password = "default";

        // Hash the default password
        $hashed_password = password_hash($default_password, PASSWORD_DEFAULT);

        // Update the password in the database
        $query = "UPDATE register SET password='$hashed_password' WHERE id='$id'";
        $query_run = mysqli_query($connection, $query);

        if($query_run) {
            // Password reset successfully
            echo "<script>alert('Password reset successfully to default.'); window.location='index.php';</script>";
        } else {
            // Error resetting password
            echo "<script>alert('Error resetting password.'); window.location='edit_register.php';</script>";
        }
    } else {
        // User ID not provided
        echo "<script>alert('User ID not provided.'); window.location='edit_register.php';</script>";
    }
}
    ?>
