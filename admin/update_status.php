<?php
include_once("connect.php");

if (isset($_POST['id']) && isset($_POST['status'])) {
    $id = $_POST['id'];
    $current_status = $_POST['status'];

    // Toggle status
    $new_status = ($current_status == 'active') ? 'inactive' : 'active';

    // Update status in the database
    $update_sql = "UPDATE pnp_student SET status = '$new_status' WHERE id = $id";
    if (mysqli_query($conn, $update_sql)) {
        echo "Status updated successfully.";
    } else {
        echo "Error updating status: " . mysqli_error($conn);
    }

    // Redirect back to the main page
    header("Location: viewdata.php"); // Replace 'your_main_page.php' with the actual name of your main page
    exit();
} else {
    echo "No student ID or status provided.";
}

mysqli_close($conn);
?>
