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
            <h6 class="m-0 font-weight-bold text-primary"> EDIT Prediction </h6>
        </div>
        <div class="card-body">
        <?php

            if(isset($_POST['edit_row']))
            {
                $row_id = $_POST['row_id'];
                
                $query = "SELECT * FROM load_predict WHERE id='$row_id' ";
                $query_run = mysqli_query($connection, $query);

                foreach($query_run as $row)
                {
                    ?>

                        <form action="update_pred.php" method="POST">

                            <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">

                                <div class="form-group">
                                <label> Gender </label><br>
                                <input type="radio" name="edit_gender" value="1" <?php if($row['gender'] == 1) echo "checked"; ?>> Male
                                <input type="radio" name="edit_gender" value="0" <?php if($row['gender'] == 0) echo "checked"; ?>> Female
                            </div>
                            <div class="form-group">
                                <label> Married </label><br>
                                <input type="radio" name="edit_married" value="1" <?php if($row['married'] == 1) echo "checked"; ?>> Yes
                                <input type="radio" name="edit_married" value="0" <?php if($row['married'] == 0) echo "checked"; ?>> No
                            </div>
                            <div class="form-group">
                                <label> Education </label><br>
                                <input type="radio" name="edit_education" value="1" <?php if($row['education'] == 1) echo "checked"; ?>> Yes
                                <input type="radio" name="edit_education" value="0" <?php if($row['education'] == 0) echo "checked"; ?>> No
                            </div>
                            <div class="form-group">
                                <label> Self Employed </label><br>
                                <input type="radio" name="edit_self_employed" value="1" <?php if($row['self_employed'] == 1) echo "checked"; ?>> Yes
                                <input type="radio" name="edit_self_employed" value="0" <?php if($row['self_employed'] == 0) echo "checked"; ?>> No
                            </div>
                            <div class="form-group">
                                <label> Applicant Income </label>
                                <input type="text" name="edit_app_income" value="<?php echo $row['app_income'] ?>" class="form-control"
                                    placeholder="Enter applicant income">
                            </div>
                            <div class="form-group">
                                <label> Co-Applicant Income </label>
                                <input type="text" name="edit_co_income" value="<?php echo $row['co_income'] ?>" class="form-control"
                                    placeholder="Enter co-applicant income">
                            </div>
                            <div class="form-group">
                                <label> Loan Amount </label>
                                <input type="text" name="edit_loan_amount" value="<?php echo $row['loan_amount'] ?>" class="form-control"
                                    placeholder="Enter loan amount">
                            </div>
                            <div class="form-group">
                                <label> Loan Term </label><br>
                                <input type="radio" name="edit_loan_term" value="12" <?php if($row['loan_term'] == 12) echo "checked"; ?>> 1 Year
                                <input type="radio" name="edit_loan_term" value="36" <?php if($row['loan_term'] == 36) echo "checked"; ?>> 3 Years
                                <input type="radio" name="edit_loan_term" value="60" <?php if($row['loan_term'] == 60) echo "checked"; ?>> 5 Years
                                <input type="radio" name="edit_loan_term" value="84" <?php if($row['loan_term'] == 84) echo "checked"; ?>> 7 Years
                                <input type="radio" name="edit_loan_term" value="120" <?php if($row['loan_term'] == 120) echo "checked"; ?>> 10 Years
                                <input type="radio" name="edit_loan_term" value="180" <?php if($row['loan_term'] == 180) echo "checked"; ?>> 15 Years
                                <input type="radio" name="edit_loan_term" value="240" <?php if($row['loan_term'] == 240) echo "checked"; ?>> 20 Years
                                <input type="radio" name="edit_loan_term" value="300" <?php if($row['loan_term'] == 300) echo "checked"; ?>> 25 Years
                                <input type="radio" name="edit_loan_term" value="360" <?php if($row['loan_term'] == 360) echo "checked"; ?>> 30 Years
                                <input type="radio" name="edit_loan_term" value="480" <?php if($row['loan_term'] == 480) echo "checked"; ?>> 40 Years
                            </div>

                            <div class="form-group">
                                <label> Credit History </label><br>
                                <input type="radio" name="edit_credit_history" value="1" <?php if($row['credit_history'] == 1) echo "checked"; ?>> Yes
                                <input type="radio" name="edit_credit_history" value="0" <?php if($row['credit_history'] == 0) echo "checked"; ?>> No
                            </div>

                            <div class="form-group">
                                <label> Property Area </label><br>
                                <input type="radio" name="edit_property_area" value="2" <?php if($row['property_area'] == 2) echo "checked"; ?>> Urban
                                <input type="radio" name="edit_property_area" value="1" <?php if($row['property_area'] == 1) echo "checked"; ?>> Semi-Urban
                                <input type="radio" name="edit_property_area" value="0" <?php if($row['property_area'] == 0) echo "checked"; ?>> Rural
                            </div>

                            <a href="displayPred.php" class="btn btn-danger"> CANCEL </a>
                            <button type="submit" name="update" class="btn btn-primary"> Update </button>

                        </form>
                        <?php
                }
            }
        ?>
        </div>
    </div>
</div>

</div>
