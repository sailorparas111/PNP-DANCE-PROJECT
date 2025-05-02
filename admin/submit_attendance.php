<?php
// Establish database connection
include('connect.php');

$date = $_POST['date']; // Assuming you sanitize these inputs
$activity = $_POST['activity'];
$students = $_POST['students']; // Assuming an array of student IDs

// Insert attendance records for selected students
foreach ($students as $student) {
    // Fetch student name based on student_id
    $student_query = "SELECT sname FROM pnp_student WHERE id = '$student'";
    $student_result = mysqli_query($conn, $student_query);
    $student_row = mysqli_fetch_assoc($student_result);
    $sname = $student_row['sname'];

    // Modify this query based on your database structure
    $query = "INSERT INTO attendance (student_id, sname, attendance_date, activity, status) VALUES ('$student', '$sname', '$date', '$activity', 'present')";
    mysqli_query($conn, $query);
}

// Redirect to view attendance page or show a success message
?>

