<?php
// Include logout.php and connect.php
include("logout.php");
include("connect.php");

// Start the session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if the username is set in the session
$username = isset($_SESSION['username']) ? $_SESSION['username'] : "Guest";
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
    <div class="height-100 bg-light">
        <h4>Main Components</h4>

        <div class="container">
            <!-- <h3>Welcome, <?php //echo $username; ?></h3> -->
            <!-- Your other content goes here -->
        </div>

        <?php
        // Fetch number of students
        $studentsQuery = "SELECT COUNT(*) as total_students FROM pnp_student";
        $studentsResult = mysqli_query($conn, $studentsQuery);

        if (!$studentsResult) {
            die("Error in students query: " . mysqli_error($conn));
        }

        $studentsData = mysqli_fetch_assoc($studentsResult);
        $totalStudents = $studentsData['total_students'];

        // Fetch fees collected
        $feesQuery = "SELECT SUM(total) as total_fees FROM receipt_table";
        $feesResult = mysqli_query($conn, $feesQuery);

        if (!$feesResult) {
            die("Error in fees query: " . mysqli_error($conn));
        }

        $feesData = mysqli_fetch_assoc($feesResult);
        $totalFees = $feesData['total_fees'];

        // Fetch total users
        $usersQuery = "SELECT COUNT(*) as total_users FROM pnpadmin";
        $usersResult = mysqli_query($conn, $usersQuery);

        if (!$usersResult) {
            die("Error in users query: " . mysqli_error($conn));
        }

        $usersData = mysqli_fetch_assoc($usersResult);
        $totalUsers = $usersData['total_users'];

        // Fetch number of active students
        $activeStudentsQuery = "SELECT COUNT(*) as active_students FROM pnp_student WHERE status = 'active'";
        $activeStudentsResult = mysqli_query($conn, $activeStudentsQuery);

        if (!$activeStudentsResult) {
            die("Error in active students query: " . mysqli_error($conn));
        }

        $activeStudentsData = mysqli_fetch_assoc($activeStudentsResult);
        $activeStudents = $activeStudentsData['active_students'];
        ?>

        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="card mt-3 mx-auto">
                    <div class="card-body text-center bg-primary text-white rounded">
                        <h3 class="card-text">
                            <?php echo $totalStudents; ?>
                        </h3>
                        <h5 class="card-title">Total Students</h5>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card mt-3 mx-auto">
                    <div class="card-body text-center bg-info text-white rounded">
                        <h3 class="card-text">
                            <?php echo $activeStudents; ?>
                        </h3>
                        <h5 class="card-title">Active Students</h5>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card mt-3 mx-auto">
                    <div class="card-body text-center bg-secondary text-white rounded">
                        <h3 class="card-text">
                            <?php echo $totalFees; ?> Rupees
                        </h3>
                        <h5 class="card-title">Total Fees Collected</h5>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card mt-3 mx-auto">
                    <div class="card-body text-center bg-success text-white rounded">
                        <h3 class="card-text">
                            <?php echo $totalUsers; ?>
                        </h3>
                        <h5 class="card-title">Total Users</h5>
                    </div>
                </div>
            </div>

            

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-GLhlTQ8iKuOVpL+KGkCL5MdHEabfQxu1c+g7lsF86l/20RS6I5wG5F5iJazExg"
        crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="js/nav.js"></script>
</body>

</html>
