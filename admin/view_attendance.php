<?php
// Establish database connection
include("logout.php");
include('connect.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="css/stylesi.css">

    <title>Attendance Records</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>

    <?php include("side_navbar.php"); ?>

    <div class="container mt-4">
        <h2 class="mb-3">Attendance Records</h2>

        <!-- Sorting Options -->
        <div class="mb-3">
            <a href="view_attendance.php?sort=status" class="btn btn-warning btn-sm">Sort by Status</a>
            <a href="view_attendance.php?sort=date" class="btn btn-primary btn-sm">Sort by Date</a>
            <a href="view_attendance.php?sort=name" class="btn btn-success btn-sm">Sort by Name</a>
            <a href="view_attendance.php?sort=activity" class="btn btn-info btn-sm">Sort by Activity</a>
        </div>

        <?php
        // Secure sorting parameter
        $sort = isset($_GET['sort']) ? mysqli_real_escape_string($conn, $_GET['sort']) : 'status';

        // Base query with status column
        $query = "SELECT a.attendance_date, a.activity, a.student_id, s.sname, s.status 
                  FROM attendance a 
                  INNER JOIN pnp_student s ON a.student_id = s.id";

        // Sorting logic
        switch ($sort) {
            case 'status':
                $query .= " ORDER BY s.status DESC, a.attendance_date DESC"; // Sorting by status first
                break;
            case 'date':
                $query .= " ORDER BY a.attendance_date DESC";
                break;
            case 'name':
                $query .= " ORDER BY s.sname ASC";
                break;
            case 'activity':
                $query .= " ORDER BY a.activity ASC";
                break;
            default:
                $query .= " ORDER BY s.status DESC, a.attendance_date DESC"; // Default sorting
                break;
        }

        // Execute the query
        $result = mysqli_query($conn, $query);

        // Check if records exist
        if (mysqli_num_rows($result) > 0) {
            echo '<div class="table-responsive">';
            echo '<table class="table table-bordered table-striped">';
            echo '<thead class="table-dark">';
            echo '<tr><th>Date</th><th>Activity</th><th>Student ID</th><th>Student Name</th><th>Status</th><th>Action</th></tr>';
            echo '</thead>';
            echo '<tbody>';
            
            while ($row = mysqli_fetch_assoc($result)) {
                $statusText = ($row['status'] == 'active') ? 'Active' : 'Inactive';
                $toggleStatus = ($row['status'] == 'active') ? 'inactive' : 'active';
                
                echo '<tr>';
                echo '<td>' . htmlspecialchars($row['attendance_date']) . '</td>';
                echo '<td>' . htmlspecialchars($row['activity']) . '</td>';
                echo '<td>' . htmlspecialchars($row['student_id']) . '</td>';
                echo '<td>' . htmlspecialchars($row['sname']) . '</td>';
                echo '<td><span class="badge bg-'.($row['status'] == 'active' ? 'success' : 'danger').'">'.$statusText.'</span></td>';
                echo '<td><button class="btn btn-sm btn-warning toggle-status" data-id="'.$row['student_id'].'" data-status="'.$toggleStatus.'">Toggle Status</button></td>';
                echo '</tr>';
            }

            echo '</tbody>';
            echo '</table>';
            echo '</div>';
        } else {
            echo '<div class="alert alert-warning">No attendance records found.</div>';
        }

        // Close the database connection
        mysqli_close($conn);
        ?>

    </div>

    <!-- Bootstrap & JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
    $(document).ready(function() {
        $('#activity').change(function() {
            var activity = $(this).val();
            $.ajax({
                url: 'fetch_students.php',
                method: 'POST',
                data: { activity: activity },
                success: function(response) {
                    $('#studentList').html(response);
                }
            });
        });
    });
</script>


</body>
</html>
