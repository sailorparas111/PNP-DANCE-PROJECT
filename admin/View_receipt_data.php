<?php
include("connect.php");
include("logout.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Boxicons CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <link rel="stylesheet" href="css/stylesi.css">

    <title>Bootstrap Icon Sidebar</title>
</head>

<body>

    <?php
    include("side_navbar.php");
    ?>

    <!-- Container Main start -->
    <div class="container">
        <div class="row">
            <?php

            // Sorting order variables for receipt data table
            $receipt_order = '';
            $receipt_order_field = '';

            // Check for sorting request for receipt data table
            if (isset($_GET['receipt_order']) && isset($_GET['receipt_field'])) {
                $receipt_order = $_GET['receipt_order'];
                $receipt_order_field = $_GET['receipt_field'];
            }

            // Display Receipt Table
            $sql_receipt = "SELECT * FROM receipt_table";

            // Apply sorting if requested for receipt data table
            if (!empty($receipt_order) && !empty($receipt_order_field)) {
                $sql_receipt .= " ORDER BY $receipt_order_field $receipt_order";
            }

            $result_receipt = mysqli_query($conn, $sql_receipt);

            if ($result_receipt) {
                if (mysqli_num_rows($result_receipt) > 0) {
                    echo "<div class='col-md-12'>";
                    echo "<h5>RECEIPT DATA</h5>";
                    echo "<table class='table table-bordered'>";
                    echo "<thead><tr>
                            <th>Student ID <a href='?receipt_field=student_id&receipt_order=asc'><i class='bx bx-up-arrow'></i></a> <a href='?receipt_field=student_id&receipt_order=desc'><i class='bx bx-down-arrow'></i></a></th>
                            <th>Student Name <a href='?receipt_field=sname&receipt_order=asc'><i class='bx bx-up-arrow'></i></a> <a href='?receipt_field=sname&receipt_order=desc'><i class='bx bx-down-arrow'></i></a></th>
                            <th>Receipt Number <a href='?receipt_field=receipt_no&receipt_order=asc'><i class='bx bx-up-arrow'></i></a> <a href='?receipt_field=receipt_no&receipt_order=desc'><i class='bx bx-down-arrow'></i></a></th>
                            <th>Activity</th>
                            <th>Receipt Operations</th>
                          </tr></thead>";
                    echo "<tbody>";

                    while ($row = mysqli_fetch_assoc($result_receipt)) {
                        echo "<tr>
                                <td>{$row['student_id']}</td>
                                <td>{$row['sname']}</td>
                                <td>{$row['receipt_no']}</td>
                                <td>{$row['activity']}</td>
                                <td><a href='view_receipt.php?receipt_no={$row['receipt_no']}' class='btn btn-success'>View Receipt</a>
                                <a href='edit_receipt.php?id={$row['id']}' class='btn btn-primary'>Edit Receipt</a>
                                <a href='delete_receipt.php?id={$row['id']}' class='btn btn-danger'>Delete Receipt</a></td>
                                </tr>";
                    }

                    echo "</tbody></table>";
                    echo "</div>";

                    // Free the result set
                    mysqli_free_result($result_receipt);
                } else {
                    echo "No data in the table.";
                }
            } else {
                echo "Error fetching data: " . mysqli_error($conn);
            }

            // Close the database connection
            mysqli_close($conn);
            ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-GLhlTQ8iKuOVpL+KGkCL5MdHEabfQxu1c+g7lsF86l/20RS6I5wG5F5iJazExg"
        crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="js/nav.js"></script>
</body>

</html>