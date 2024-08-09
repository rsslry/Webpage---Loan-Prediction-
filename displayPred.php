<?php
include('session.php');
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 

$query = "SELECT id, gender, married, education, self_employed, app_income, co_income, loan_amount, loan_term, credit_history, property_area, result FROM load_predict";
$query_result = mysqli_query($connection, $query); 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="CSS/dPred.css">
    <link rel="icon" href="images/icon.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="display.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<main class="table" id="customers_table">
<section class="table__header">
            <h1>RESULT OF PREDICTIONS</h1>
</section>
<section class="table__body">
        <table>
                <thead>
                    <tr>
                        <th> <span class="icon-arrow">&UpArrow;</span> Gender:</th>
                        <th> <span class="icon-arrow">&UpArrow;</span> Marital Status: </th>
                        <th> <span class="icon-arrow">&UpArrow;</span> Education: </th>
                        <th> <span class="icon-arrow">&UpArrow;</span> Work: </th>
                        <th> <span class="icon-arrow">&UpArrow;</span> Applicant Income: </th>
                        <th> <span class="icon-arrow">&UpArrow;</span> Co - Applicant Income: </th>
                        <th> <span class="icon-arrow">&UpArrow;</span> Loan Amount: </th>
                        <th> <span class="icon-arrow">&UpArrow;</span> Term of Loan in months: </th>
                        <th> <span class="icon-arrow">&UpArrow;</span> Do your credit history meet the guidelines? </th> 
                        <th> <span class="icon-arrow">&UpArrow;</span> Location of your property: </th>   
                        <th> <span class="icon-arrow">&UpArrow;</span> RESULT / ELIGIBLE OR NOT </th>  
                        <th> <span class="icon-arrow">&UpArrow;</span> ACTION </th>  
                    </tr>
                </thead>
                <tbody>
                <?php
while ($row = mysqli_fetch_assoc($query_result)) {
    
    $gender = ($row['gender'] == 1) ? "Male" : "Female";
    $married = ($row['married'] == 1) ? "Married" : "Not Married";
    $education = ($row['education'] == 1) ? "Graduated" : "Not Graduate";
    $selfEmployedText = ($row['self_employed'] == 1) ? "Self-Employed" : "Not Self-Employed";
    $credit_historyText = ($row['credit_history'] == 1) ? "Pay on time" : "Didn't pay on time";
    $property_areaText = ($row['property_area'] == 2) ? "Urban" : (($row['property_area'] == 1) ? "Semi-Urban" : "Rural");
    $yText = ($row['result'] == 1) ? "Eligible yey" : "Not Eligible Ouch";
    echo "<tr>";
    echo "<td>" . $gender . "</td>";
    echo "<td>" . $married . "</td>";
    echo "<td>" . $education. "</td>"; 
    echo "<td>" . $selfEmployedText . "</td>"; 
    echo "<td>" . $row['app_income'] . "</td>";
    echo "<td>" . $row['co_income'] . "</td>";
    echo "<td>" . $row['loan_amount'] . "</td>"; 
    echo "<td>" . $row['loan_term'] . "</td>"; 
    echo "<td>" . $credit_historyText . "</td>";
    echo "<td>" . $property_areaText . "</td>"; 
    echo "<td>" . $yText . "</td>"; 
    echo "<td class='action-container'>";
    echo "<form method='post' action='edit_pred.php'>"; // Assuming edit_row.php is your script to handle editing
    echo "<input type='hidden' name='row_id' value='" . $row['id'] . "'>"; // Assuming there's a unique identifier like 'id' for each row
    echo "<button type='submit' name='edit_row' class='btn-rounded btn-primary btn-block'>Edit</button>";
    echo "</form>";
    echo "<form method='post' action='delete_pred.php'>"; // Assuming delete_row.php is your script to handle deletion
    echo "<input type='hidden' name='row_id' value='" . $row['id'] . "'>"; // Assuming there's a unique identifier like 'id' for each row
    echo "<button type='submit' name='delete_row' class='btn-rounded btn-danger btn-block'>Delete</button>";
    echo "</form>";
    echo "</td>";
    echo "</tr>"; 
}
?>

    </table>
</section>
</main>
    <script src="js/script.js"></script>

    <?php
include('includes/scripts.php');
include('includes/footer.php');
?>
</body>
</html>