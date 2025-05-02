<?php
include("logout.php");
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
        <?php
include_once("connect.php");

// Retrieve all data from the inquiry table
$sql_all_data = "SELECT * FROM inquiry";
$result_all_data = mysqli_query($conn, $sql_all_data);

// Fetch data using selected activity
if (isset($_GET['activity'])) {
    $selected_activity = $_GET['activity'];

    // SQL query to retrieve data from the inquiry table based on the selected activity
    $sql = "SELECT * FROM inquiry WHERE activity = '$selected_activity'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<h2>Data filtered by activity: $selected_activity</h2>";
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Current Date</th><th>Inquiry Person</th><th>Inquiry For</th><th>Age</th><th>Contact 1</th><th>Contact 2</th><th>Reference</th><th>Remark</th><th>Activities</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["cdate"] . "</td>";
            echo "<td>" . $row["iq_name"] . "</td>";
            echo "<td>" . $row["iq_for"] . "</td>";
            echo "<td>" . $row["age"] . "</td>";
            echo "<td>" . $row["contact1"] . "</td>";
            echo "<td>" . $row["contact2"] . "</td>";
            echo "<td>" . $row["reference"] . "</td>";
            echo "<td>" . $row["remark"] . "</td>";
            echo "<td>" . $row["activity"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No results for the selected activity: $selected_activity";
    }
}

// Display all data initially
echo "<form method='GET'>";
echo "<select name='activity'>";
echo "<option value=''>Select Activity</option>";
mysqli_data_seek($result_all_data, 0); // Reset the data pointer
while ($row = mysqli_fetch_assoc($result_all_data)) {
    echo "<option value='" . $row["activity"] . "'>" . $row["activity"] . "</option>";
}
echo "</select>";
echo "<input type='submit' value='Filter'>";
echo "</form>";

// Close the database connection
mysqli_close($conn);
?>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-GLhlTQ8iKuOVpL+KGkCL5MdHEabfQxu1c+g7lsF86l/20RS6I5wG5F5iJazExg"
            crossorigin="anonymous"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <script src="js/nav.js"></script>
    </body>

</html>

