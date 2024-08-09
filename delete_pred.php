<?php
// Check if the form is submitted
if(isset($_POST['delete_row']) && isset($_POST['row_id'])) {
    // Include necessary files
    include('session.php');
    include('security.php');

    // Get the row id from the form
    $row_id = $_POST['row_id'];

    // Perform the deletion query
    $delete_query = "DELETE FROM load_predict WHERE id = '$row_id'";
    $result = mysqli_query($connection, $delete_query);

    // Check if the deletion was successful
    if($result) {
        // Alert message
        echo "<script>alert('Row deleted successfully.');</script>";
        // Redirect back to displayPred.php after 1 second
        echo "<script>setTimeout(function() { window.location.href = 'displayPred.php'; }, 1000);</script>";
    } else {
        echo "Error deleting row: " . mysqli_error($connection);
    }
} else {
    echo "Invalid request.";
}
?>
