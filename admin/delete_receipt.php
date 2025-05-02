
<?php
include_once("connect.php");

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Delete the student record from the database
    $delete_query = "DELETE FROM receipt_table WHERE id = $id";
    $delete_result = mysqli_query($conn, $delete_query);
    
    if($delete_result) {
        header("Location: view_receipt_data.php");
        exit;
    } else {
        echo "Error deleting student: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
