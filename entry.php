<?php
// Include connection file
include('session.php');
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 

// Check if form is submitted
if (isset($_POST['submit'])) {
    // Retrieve form data
    $gender = $_POST['gender'];
    $married = $_POST['married'];
    $education = $_POST['education'];
    $self_employed = $_POST['self-employed'];
    $app_income = $_POST['app-income'];
    $co_income = $_POST['co-income'];
    $loan_amount = $_POST['loan-amount'];
    $loan_term = $_POST['loan-term'];
    $credit_history = $_POST['credit_history'];
    $property_area = $_POST['property_area'];

       // Run the machine learning model to get the potability prediction
       $pythonScript = "classify.py";  // Update this with the correct path to your Python script
       $modelFile = "rf_model.pkl";    // Update this with the correct path to your model file
       $data_to_classify = array($gender, $married, $education, $self_employed, $app_income, $co_income, $loan_amount, $loan_term, $credit_history, $property_area);
       // Perform the classification using the model
       $classification = shell_exec("python $pythonScript $modelFile " . implode(" ", $data_to_classify));

       echo $classification; 
       // Insert the prediction into the database
       $sql = "INSERT INTO load_predict(gender, married, education, self_employed, app_income, co_income, loan_amount,  loan_term ,credit_history, property_area, result) 
                VALUES ('$gender', '$married', '$education', '$self_employed', '$app_income', '$co_income', '$loan_amount', '$loan_term', '$credit_history', '$property_area', '$classification')"; 

       $result = mysqli_query($connection, $sql);
       if ($result) {
           echo "<script>alert('Prediction added successfully')</script>";
       } else {
           echo "<script>alert('Error: " . mysqli_error($conn) . "')</script>";
       }
   }
    
?>


<div class="container-fluid">
    <div class="predict-container">

        <h1>ARE YOU ELIGIBLE TO LOAN?</h1>
        
        <form action = "entry.php"  method="POST" >


             <div class="self-gender">
                <label for="#">Gender</label><br>
                
                    <input type="radio" id="male" name="gender" value= 1 > 
                    <label for="">Male</label> <br> 
                    <input type="radio" id="female" name="gender" value= 0 >
                    <label for="">Female</label> <br>
            </div>

            <div class="self-married">
                <label for="#">Are you married?</label><br>
                
                    <input type="radio" id="married" name="married" value= 1 > 
                    <label for="">YES</label> <br> 
                    <input type="radio" id="notmarried" name="married" value= 0 >
                    <label for="">NO</label> <br>
            </div>

            <div class="self-education">
                <label for="#">Are you a graduate?</label><br>
                
                    <input type="radio" id="grad" name="education" value= 1 > 
                    <label for="">YES</label> <br> 
                    <input type="radio" id="ungrad" name="education" value= 0 >
                    <label for="">NO</label> <br>
            </div>

            <div class="self-employed">
                <label for="#">Are you a self-employed?</label><br>
                
                    <input type="radio" id="yes" name="self-employed" value= 1 > 
                    <label for="">YES</label> <br> 
                    <input type="radio" id="no" name="self-employed" value= 0 >
                    <label for="">NO</label> <br>
            </div>
        

            <label for="app-income"> Applicant Income: </label> <br>
            <input type = "number" id="income" name="app-income" required> <br>

            <label for="co-income"> Co-Applicant Income: </label> <br>
            <input type="number" id="co-income" name="co-income" required> <br>

            <label for="loan-amount"> Loan Amount in Thousands: </label> <br>
            <input type="number" id="loan-amount" name="loan-amount" required> <br>

            <div class="loan-term">
                <label for="#">Loan Term in Months</label><br>
                    <input type="radio" id="term" name="loan-term" value= 12 > 
                    <label for="">1 Year</label> <br> 
                    <input type="radio" id="term" name="loan-term" value= 36 > 
                    <label for="">3 Years</label> <br> 
                    <input type="radio" id="term" name="loan-term" value= 60 > 
                    <label for="">5 Years</label> <br>
                    <input type="radio" id="term" name="loan-term" value= 84 > 
                    <label for="">7 Years</label> <br> 
                    <input type="radio" id="term" name="loan-term" value= 120 > 
                    <label for="">10 Years</label> <br> 
                    <input type="radio" id="term" name="loan-term" value= 180 > 
                    <label for="">15 Years</label> <br> 
                    <input type="radio" id="term" name="loan-term" value= 240 > 
                    <label for="">20 Years</label> <br> 
                    <input type="radio" id="term" name="loan-term" value= 300 > 
                    <label for="">25 Years</label> <br> 
                    <input type="radio" id="term" name="loan-term" value= 360 > 
                    <label for="">30 Years</label> <br> 
                    <input type="radio" id="term" name="loan-term" value= 480 > 
                    <label for="">40 Years</label> <br> 
            </div>
            
            <div class="credit_history">
                <label for="#">Do your credit history meet the guidelines?</label><br>
                
                    <input type="radio" id="yes" name="credit_history" value= 1 > 
                    <label for="">YES</label> <br> 
                    <input type="radio" id="no" name="credit_history" value= 0 >
                    <label for="">NO</label> <br>
            </div>

            <div class="property_area">
                <label for="#">Where does your property located?</label><br>
                
                    <input type="radio" id="urban" name="property_area" value= 2 > 
                    <label for="">URBAN</label> <br> 
                    <input type="radio" id="semi-urban" name="property_area" value= 1 >
                    <label for="">SEMI-URBAN</label> <br>
                    <input type="radio" id="rural" name="property_area" value= 0 >
                    <label for="">RURAL</label> <br>
            </div>

            <br>
            

            <input type="submit" name="submit" id="submit" class="btn btn-primary btn-lg btn-block">
 <br>

        </form>
</div>
</div>
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>