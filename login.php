<?php
session_start();
include('includes/header.php');  

if(isset($_SESSION['status']) && $_SESSION['status'] != '') {
    echo '<h2 class="bg-danger text-white"> '.$_SESSION['status'].' </h2>';
    unset($_SESSION['status']);
}
?>



<?php
// Check if session variables are set
if(isset($_SESSION['status']) && isset($_SESSION['status_code'])) {
    // Display the alert based on the session variables
    $status = $_SESSION['status'];
    $status_code = $_SESSION['status_code'];
    echo "<script>alert('$status');</script>";
    // Unset the session variables to clear the alert
    unset($_SESSION['status']);
    unset($_SESSION['status_code']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!--LOGIN-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="css/login.css">
    <title>Document</title>
</head>
<body>
<div class="container" id="container">
        <div class="form-container sign-up">
        <form action="signup.php" method="POST">
                <h5>Create Account</h5>
                <input type="text" name="firstname" class="form-control" placeholder="Enter firstname">
                <input type="text" name="middlename" class="form-control" placeholder="Enter middlename">
                <input type="text" name="lastname" class="form-control" placeholder="Enter lastname">
                <input type="text" name="type" class="form-control" placeholder="user or admin">
                <input type="text" name="username" class="form-control" placeholder="Enter Username">
                <input type="password" name="password" class="form-control" placeholder="Enter Password">
                <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password">
                <button type="submit" name="registerbtn">SUBMIT</button>
            </form>
        </div>
        <div class="form-container sign-in">


            <form class="user" action="login_code.php" method="POST">
                <h1>Sign In</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <span>or use your email password</span>
                <input type="text" name="emaill" class="form-control form-control-user" placeholder="Enter Email Username...">
                <input type="password" name="passwordd" class="form-control form-control-user" placeholder="Password">
                <a href="#">Forget Your Password?</a>
                <button type="submit" name="login_btn">LOGIN</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Enter your personal details to use all of site features</p>
                    <button class="hidden" id="login">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Hello, Friend!</h1>
                    <p>Register with your personal details to use all of site features</p>
                    <button class="hidden" id="register">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <script src="js/login.js"></script>
</body>

</html>
</body>

   