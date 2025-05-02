<?php
include("logout.php");
include("connect.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Boxicons CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <link rel="stylesheet" href="css/stylesi.css">

    <title>Bootstrap Icon Sidebar</title>
</head>

<body>

    <?php
    include("side_navbar.php");
    ?>
    <!--Container Main start-->

    <div class="container">
        <h2 class="mt-5">Attendance System</h2>
        <form id="attendanceForm" action="submit_attendance.php" method="POST">
            <div class="col-md-4">
            <div class="mb-3">
                <label for="date" class="form-label">Select Date:</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>
            
            <div class="mb-3">
                <label for="activity" class="form-label">Select Activity:</label>
                <select name="activity" id="activity" class="form-select" required>
                    <option value="">Select Activity</option>
                    <?php
                    $sql = "SELECT DISTINCT activity FROM pnp_student";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row['activity'] . "'>" . $row['activity'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            
            <fieldset class="mb-3">
                <legend>Students</legend>
                <!-- Student checkboxes will be populated dynamically -->
                <div id="studentList"></div>
            </fieldset>
            
            <button type="submit" class="btn btn-primary">Submit Attendance</button>
            <a href="view_attendance.php" class="btn btn-secondary">View Attendance</a>
            </div>
        </form>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-GLhlTQ8iKuOVpL+KGkCL5MdHEabfQxu1c+g7lsF86l/20RS6I5wG5F5iJazExg"
        crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="js/nav.js"></script>

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