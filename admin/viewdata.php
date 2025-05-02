<?php
include("logout.php");
include_once("connect.php");

// Sorting order variables
$order = isset($_GET['order']) ? $_GET['order'] : 'asc';
$field = isset($_GET['field']) ? $_GET['field'] : 'id';

// Function to fetch students based on status
function fetch_students($conn, $status, $field, $order) {
    $status = mysqli_real_escape_string($conn, $status);
    $field = mysqli_real_escape_string($conn, $field);
    $order = mysqli_real_escape_string($conn, $order);
    $query = "SELECT * FROM pnp_student WHERE status = '$status' ORDER BY $field $order";
    return mysqli_query($conn, $query);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Boxicons CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="css/stylesi.css">
</head>
<body>
<?php include("side_navbar.php"); ?>
<div class="container mt-4">
    <h2>Active Students</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th><a href="?field=id&order=<?php echo ($field == 'id' && $order == 'asc') ? 'desc' : 'asc'; ?>">ID</a></th>
                <th><a href="?field=cdate&order=<?php echo ($field == 'cdate' && $order == 'asc') ? 'desc' : 'asc'; ?>">Current Date</a></th>
                <th><a href="?field=sname&order=<?php echo ($field == 'sname' && $order == 'asc') ? 'desc' : 'asc'; ?>">Student Name</a></th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $active_students = fetch_students($conn, 'active', $field, $order);
            while ($row = mysqli_fetch_assoc($active_students)) {
                echo "<tr>";
                echo "<td>{$row['id']}</td>";
                echo "<td>" . date("d-m-Y", strtotime($row["cdate"])) . "</td>";
                echo "<td>{$row['sname']}</td>";
                echo "<td>" . ucfirst($row['status']) . "</td>";
                echo "<td>
                        <a href='profile.php?id={$row['id']}' class='btn btn-sm btn-primary'>Profile</a>
                        <a href='edit_student.php?id={$row['id']}' class='btn btn-sm btn-warning mx-2'>Edit</a>
                        <a href='add_receipt.php?id={$row['id']}' class='btn btn-sm btn-secondary mx-2'>Make Receipt</a>
                        <a href='delete_student.php?id={$row['id']}' class='btn btn-sm btn-danger'>Delete</a>
                        <form action='update_status.php' method='POST' style='display:inline-block;'>
                            <input type='hidden' name='id' value='{$row['id']}'>
                            <input type='hidden' name='status' value='{$row['status']}'>
                            <button type='submit' class='btn btn-sm btn-info mx-2 bhargav'>Deactivate</button>
                        </form>
                      </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <h2>Inactive Students</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th><a href="?field=id&order=<?php echo ($field == 'id' && $order == 'asc') ? 'desc' : 'asc'; ?>">ID</a></th>
                <th><a href="?field=cdate&order=<?php echo ($field == 'cdate' && $order == 'asc') ? 'desc' : 'asc'; ?>">Current Date</a></th>
                <th><a href="?field=sname&order=<?php echo ($field == 'sname' && $order == 'asc') ? 'desc' : 'asc'; ?>">Student Name</a></th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $inactive_students = fetch_students($conn, 'inactive', $field, $order);
            while ($row = mysqli_fetch_assoc($inactive_students)) {
                echo "<tr>";
                echo "<td>{$row['id']}</td>";
                echo "<td>" . date("d-m-Y", strtotime($row["cdate"])) . "</td>";
                echo "<td>{$row['sname']}</td>";
                echo "<td>" . ucfirst($row['status']) . "</td>";
                echo "<td>
                        <form action='update_status.php' method='POST' style='display:inline-block;'>
                            <input type='hidden' name='id' value='{$row['id']}'>
                            <input type='hidden' name='status' value='{$row['status']}'>
                            <button type='submit' class='btn btn-sm btn-success mx-2'>Activate</button>
                        </form>
                      </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Custom JS -->
<script src="js/nav.js"></script>
</body>
</html>
