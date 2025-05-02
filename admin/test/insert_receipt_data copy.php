<?php
//include_once("connect.php");

// if (isset($_GET['receipt_no'])) {
//     $receipt_no = $_GET['receipt_no'];
    
//     $sql = "SELECT * FROM receipt_table WHERE receipt_no = '$receipt_no'";
//     $result = mysqli_query($conn, $sql);

//     if (mysqli_num_rows($result) > 0) {
//         $row = mysqli_fetch_assoc($result);

//         // Display the retrieved data
//         echo "Receipt No: " . $row['receipt_no'] . "<br>";
//         echo "Date: " . $row['cdate'] . "<br>";
//         echo "Student ID: " . $row['student_id'] . "<br>";
//         echo "Student Name: ". $row["sname"] . "<br>";
//         echo "Contact: ". $row["contact1"] .",". $row["contact2"] . "<br>";
//         echo "Address: ". $row["addr"] . "<br>";
//         echo "Activity: ". $row["activity"] ."<br>";
//         echo "Strating Date: ". $row["s_date"] . "<br>";
//         echo "Ending Date: ". $row["e_date"] . "<br>";
//         echo "Course: ". $row["course"] . "<br>";
//         echo "Amount: ". $row["pay_amount"] . "<br>";
//         echo "Total Amount: ". $row["total"] . "<br>";
//         echo "Total Amount in Words: ". $row["total_word"] . "<br>";
//         echo "Payment Mode: " . $row['payment_mode'] . "<br>";
        

//         // Display other fields
//     } else {
//         echo "Receipt not found";
//     }
// } else {
//     echo "No receipt number provided";
// }

// mysqli_close($conn);
?>


<!-- Tabular form -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<?php
include_once("connect.php");

if (isset($_GET['receipt_no'])) {
    $receipt_no = $_GET['receipt_no'];
    
    $sql = "SELECT * FROM receipt_table WHERE receipt_no = '$receipt_no'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<h1>Receipt Details</h1>";
        echo "<table border='1'>";
        $row = mysqli_fetch_assoc($result);
        echo "<tr><td>Receipt No</td><td>" . $row['receipt_no'] . "</td><td>Date</td><td>" . $row['cdate'] . "</td></tr>";
        echo "<tr><td>Student Name</td><td>" . $row["sname"] . "</td></tr>";
        echo "<tr><td>Contact</td><td>" . $row["contact1"] . ", " . $row["contact2"] . "</td></tr>";
        echo "<tr><td>Address</td><td>" . $row["addr"] . "</td></tr>";
        echo "<tr><td>Activity</td><td>" . $row["activity"] . "</td></tr>";
        echo "<tr><td>Starting Date</td><td>" . $row["s_date"] . "</td></tr>";
        echo "<tr><td>Ending Date</td><td>" . $row["e_date"] . "</td></tr>";
        echo "<tr><td>Course</td><td>" . $row["course"] . "</td></tr>";
        echo "<tr><td>Amount</td><td>" . $row["pay_amount"] . "</td></tr>";
        echo "<tr><td>Total Amount</td><td>" . $row["total"] . "</td></tr>";
        echo "<tr><td>Total Amount in Words</td><td>" . $row["total_word"] . "</td></tr>";
        echo "<tr><td>Payment Mode</td><td>" . $row['payment_mode'] . "</td></tr>";
        echo "</table>";


        echo "<table>";

        echo "<table>";
    } else {
        echo "Receipt not found";
    }
} else {
    echo "No receipt number provided";
}

mysqli_close($conn);
?>
<body>
    
    </body>
    </html>
    