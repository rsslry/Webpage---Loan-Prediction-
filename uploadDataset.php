<?php

include('session.php');
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["csv_file"])) {
    $file_name = $_FILES["csv_file"]["name"];
    $file_temp = $_FILES["csv_file"]["tmp_name"];
    $file_type = $_FILES["csv_file"]["type"];
    $file_size = $_FILES["csv_file"]["size"];
    
 
    if ($file_type !== "text/csv") {
        echo "Error: Only CSV files are allowed.";
        exit;
    }
    

    $file = fopen($file_temp, 'r');

    $data = [];

    while (($row = fgetcsv($file)) !== false) {
        $data[] = $row;
    }

    fclose($file);

    for ($i = 1; $i < count($data); $i++) {
        $sql = "INSERT INTO dataset (Loan_ID, Gender, Married, Dependents, Education, Self_Employed, ApplicantIncome, CoapplicantIncome, LoanAmount, Loan_Amount_Term, Credit_History, Property_Area, Loan_Status) VALUES (" . 
               "'" . $data[$i][0] . "', '" . $data[$i][1] . "', '" . $data[$i][2] . "', '" . $data[$i][3] . "', '" . $data[$i][4] . "', '" . 
               $data[$i][5] . "', '" . $data[$i][6] . "', '" . $data[$i][7] . "', '" . $data[$i][8] . "', '" . $data[$i][9] . "', '" . 
               $data[$i][10] . "', '" . $data[$i][11] . "', '" . $data[$i][12] . "')";
    
        if (!$connection->query($sql)) {
            echo "Error: " . $connection->error;
            break;
    
        }
    }
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="images/icon.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/upload.css">
</head>
<body>

    <div class="container-fluid">
        <h1>UPLOAD DATASET HERE</h1>
            <form id="csv_form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
            <input type="file" name="csv_file" id="csv_file" accept=".csv"> 
            <button type="submit" name="upload">UPLOAD</button>
        </form> 
    </div>

    <?php
include('includes/scripts.php');
include('includes/footer.php');
?>
</body>
</html>