<?php
include("connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    foreach ($_POST['id'] as $student_id) {
        $attendance_date = date('Y-m-d');
        $status = isset($_POST['status'][$student_id]) ? 'Present' : 'Absent';

        $insert_query = "INSERT INTO attendance (student_id, attendance_date, status) VALUES ('$student_id', '$attendance_date', '$status')";
        $result = $conn->query($insert_query);
    }
}
?>
