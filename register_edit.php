<?php
include('session.php');
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> EDIT Admin Profile </h6>
        </div>
        <div class="card-body">
            <?php
            if(isset($_POST['edit_btn']))
            {
                $id = $_POST['edit_id'];
                
                $query = "SELECT * FROM register WHERE id='$id' ";
                $query_run = mysqli_query($connection, $query);

                foreach($query_run as $row)
                {
                    ?>

                    <form action="edit_code.php" method="POST">

                        <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">

                        <div class="form-group">
                            <label> firstname </label>
                            <input type="text" name="edit_firstname" value="<?php echo $row['firstname'] ?>" class="form-control"
                                placeholder="Enter firstname">
                        </div>
                        <div class="form-group">
                            <label> middlename </label>
                            <input type="text" name="edit_middlename" value="<?php echo $row['middlename'] ?>" class="form-control"
                                placeholder="Enter middlename">
                        </div>
                        <div class="form-group">
                            <label> lastname </label>
                            <input type="text" name="edit_lastname" value="<?php echo $row['lastname'] ?>" class="form-control"
                                placeholder="Enter lastname">
                        </div>
                        <div class="form-group">
                            <label> type </label>
                            <input type="text" name="edit_type" value="<?php echo $row['type'] ?>" class="form-control"
                                placeholder="Enter type">
                        </div>
                        <div class="form-group">
                            <label> Username </label>
                            <input type="text" name="edit_username" value="<?php echo $row['username'] ?>" class="form-control"
                                placeholder="Enter Username">
                        </div>

                        <!-- Reset Password Button -->
                        <button type="button" class="btn btn-warning" onclick="resetPassword('<?php echo $row['id']; ?>')"> Reset Password </button>

                        <a href="register.php" class="btn btn-danger"> CANCEL </a>
                        <button type="submit" name="updatebtn" class="btn btn-primary"> Update </button>

                    </form>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</div>

<!-- JavaScript function for resetting password -->
<script>
    function resetPassword(id) {
        if (confirm("Are you sure you want to reset this user's password to default?")) {
            // Redirect to reset password page or send AJAX request to reset password
            window.location.href = "reset_password.php?id=" + id;
        }
    }
</script>

</div>
