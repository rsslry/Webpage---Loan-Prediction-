<?php
include('session.php');
include('security.php');
include ('includes/header.php');
include ('includes/navbar.php');
// This is a mock user data, you should replace it with actual user data fetched from your database


// Retrieve user data based on the logged-in username
$username = $_SESSION['username']; // Assuming the username is stored in the session
$query = "SELECT * FROM register WHERE username='$username'";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($result);

// Display the user's profile information
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <img src="img/icon.png">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row['firstname'] . ' ' . $row['lastname']; ?></h5>
                    <p class="card-text">@<?php echo $row['username']; ?></p>
                    <a href="logout.php" class="btn btn-primary">LOGOUT</a>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">User Details</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item"><strong>First Name:</strong> <?php echo $row['firstname']; ?></li>
                        <li class="list-group-item"><strong>Middle Name:</strong> <?php echo $row['middlename']; ?></li>
                        <li class="list-group-item"><strong>Last Name:</strong> <?php echo $row['lastname']; ?></li>
                        <li class="list-group-item"><strong>Type:</strong> <?php echo $row['type']; ?></li>
                        <li class="list-group-item"><strong>Username:</strong> <?php echo $row['username']; ?></li>
                        <li class="list-group-item"><strong>Password:</strong> <?php echo $row['password']; ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script></script>

<?php
 include ('includes/footer.php');
 include('includes/scripts.php');
?>
