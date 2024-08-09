<?php
include('session.php');
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 


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


<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ADD NEW USER</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">

        <div class="modal-body">
          
            <div class="form-group">
                <label> First Name </label>
                <input type="text" name="firstname" class="form-control" placeholder="Enter firstname">
            </div>
            <div class="form-group">
                <label> Middle Name </label>
                <input type="text" name="middlename" class="form-control" placeholder="Enter middlename">
            </div>
            <div class="form-group">
                <label> Last Name </label>
                <input type="text" name="lastname" class="form-control" placeholder="Enter lastname">
            </div>

            <div class="form-group">
                <label for="#">Type</label><br>
                
                    <input type="radio" id="admin" name="type" value= "admin"  > 
                    <label for="">ADMIN</label> <br> 
                    <input type="radio" id="user" name="type" value= "user" >
                    <label for="">USER</label> <br>
            </div>

            <div class="form-group">
                <label> Username </label>
                <input type="text" name="username" class="form-control" placeholder="Enter Username">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter Password">
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password">
            </div>
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>




<div class="container-fluid">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
       ADD USER 
</button>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Admin Profile</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <?php
                $query =  "SELECT id, CONCAT(firstname, ' ', middlename, ' ', lastname) AS fullname, username, type FROM register";
                $query_run = mysqli_query($connection, $query);
            ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th> ID </th>
                            <th> Name </th>
                            <th> Type </th>
                            <th>Username</th>
                            <th>EDIT</th>
                            <th>DELETE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if(mysqli_num_rows($query_run) > 0)        
                        {
                            while($row = mysqli_fetch_assoc($query_run))
                            {
                        ?>
                            <tr>
                                <td><?php  echo $row['id']; ?></td>
                                <td><?php  echo $row['fullname']; ?></td>
                                <td><?php  echo $row['type']; ?></td>
                                <td><?php  echo $row['username']; ?></td>
                                <td>
                                    <form action="register_edit.php" method="post">
                                        <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="delete_code.php" method="post">
                                        <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
                                    </form>
                                </td>
                            </tr>
                        <?php
                            } 
                        }
                        else {
                            echo "No Record Found";
                        }
                        ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

</div>
<!-- container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>