<?php
// Include the database connection
include("connect.php");

// Check if the activity is set in the POST request
if (isset($_POST['activity'])) {
    // Sanitize the input to prevent SQL injection
    $activity = mysqli_real_escape_string($conn, $_POST['activity']);

    // Prepare the SQL query to fetch active students for the selected activity
    $sql = "SELECT id, sname FROM pnp_student WHERE activity = '$activity' AND status = 'active' ORDER BY sname ASC";
    $result = mysqli_query($conn, $sql);

    // Check if any students are found
    if (mysqli_num_rows($result) > 0) {
        // Loop through each student and create a checkbox input
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='form-check'>";
            echo "<input class='form-check-input' type='checkbox' name='students[]' value='" . $row['id'] . "' id='student_" . $row['id'] . "'>";
            echo "<label class='form-check-label' for='student_" . $row['id'] . "'>" . htmlspecialchars($row['sname']) . "</label>";
            echo "</div>";
        }
    } else {
        // Display a message if no active students are found for the selected activity
        echo "<p>No active students found for this activity.</p>";
    }
}
?>
