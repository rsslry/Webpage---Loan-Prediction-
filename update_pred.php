<?php
include('session.php');
include('security.php');

// Check if the form is submitted
if(isset($_POST['update'])) {
    // Retrieve the form data
    $row_id = $_POST['edit_id'];
    $edit_gender = $_POST['edit_gender'];
    $edit_married = $_POST['edit_married'];
    $edit_education = $_POST['edit_education'];
    $edit_self_employed = $_POST['edit_self_employed'];
    $edit_app_income = $_POST['edit_app_income'];
    $edit_co_income = $_POST['edit_co_income'];
    $edit_loan_amount = $_POST['edit_loan_amount'];
    $edit_loan_term = $_POST['edit_loan_term'];
    $edit_credit_history = $_POST['edit_credit_history'];
    $edit_property_area = $_POST['edit_property_area'];

    // Update the data in the database
    $query = "UPDATE load_predict SET 
                gender='$edit_gender', 
                married='$edit_married',
                education='$edit_education',  
                self_employed='$edit_self_employed', 
                app_income='$edit_app_income', 
                co_income='$edit_co_income', 
                loan_amount='$edit_loan_amount', 
                loan_term='$edit_loan_term', 
                credit_history='$edit_credit_history', 
                property_area='$edit_property_area' 
                WHERE id='$row_id'";

    $query_run = mysqli_query($connection, $query);

    if($query_run) {
        // Run the machine learning model to get the updated prediction
        $pythonScript = "classify.py";  // Update this with the correct path to your Python script
        $modelFile = "rf_model.pkl";    // Update this with the correct path to your model file
        $data_to_classify = array($edit_gender, $edit_married, $edit_education, $edit_self_employed, $edit_app_income, $edit_co_income, $edit_loan_amount, $edit_loan_term, $edit_credit_history, $edit_property_area);
        // Perform the classification using the model
        $updated_classification = shell_exec("python $pythonScript $modelFile " . implode(" ", $data_to_classify));

        // Update the classification result in the database
        $update_query = "UPDATE load_predict SET result='$updated_classification' WHERE id='$row_id'";
        $update_query_run = mysqli_query($connection, $update_query);

        if($update_query_run) {
            echo '<script>alert("Prediction data updated successfully!");</script>';
            header('Location: displayPred.php');
        } else {
            echo '<script>alert("Error updating prediction data!");</script>';
        }
    } else {
        echo '<script>alert("Error updating prediction data!");</script>';
    }
} else {
    header('Location: displayPred.php');
    exit();
}
?>
