<?php
include('connect.php');
include('logout.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
        $cdate = $_POST['cdate'];
        $receipt_no = $_POST['receipt_no'];
        $payment_mode = $_POST['payment_mode'];

        // Convert activity array to comma-separated string
        if (isset($_POST['activity']) && is_array($_POST['activity'])) {
            $activity = implode(', ', $_POST['activity']);
        } else {
            $activity = ""; // Set default value if no activities are selected
        }

        $course = $_POST['course'];
        $s_date = $_POST['s_date'];
        $e_date = $_POST['e_date'];
        $pay_amount = $_POST['pay_amount'];
        $total = $_POST['total'];
        $total_word = $_POST['total_word'];

        $update_sql = "UPDATE receipt_table SET cdate = '$cdate', receipt_no = '$receipt_no', payment_mode = '$payment_mode',
            activity = '$activity', course = '$course', s_date = '$s_date', e_date = '$e_date', pay_amount = '$pay_amount',
            total = '$total', total_word = '$total_word' WHERE id = $id";

        if (mysqli_query($conn, $update_sql)) {
            echo "Receipt data updated successfully";
        } else {
            echo "Error updating receipt data: " . mysqli_error($conn);
        }
    }
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
    
    $sql = "SELECT * FROM receipt_table WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        ?>
        <form action="edit_receipt.php?id=<?php echo $id; ?>" method="POST">
            <label for="sid">Student ID</label>
            <input type="text" name="sid" value="<?php echo $row['id']; ?>"><br>

            <label for="sname">Student Name:</label>
            <input type="text" name="sname" value="<?php echo $row['sname']; ?>"><br><br>

            <label for="contact1">Contact 01</label>
            <input type="text" name="contact1" value="<?php echo $row['contact1']; ?>"><br><br>

            <label for="contact2">contact 02</label>
            <input type="text" name="contact2" value="<?php echo $row['contact2']; ?>"><br><br>

            <label for="addr">Address</label>
            <input type="text" name="addr" value="<?php echo $row['addr']; ?>"><br><br>

            <label for="receipt_details">Receipt Details:</label><br><br>

            <label for="cdate">Date</label>
            <input type="date" name="cdate" value="<?php echo $row['cdate']; ?>"><br><br>

            <label for="receipt_no">Receipt No.</label>
            <input type="number" name="receipt_no" value="<?php echo $row['receipt_no']; ?>"><br><br>

            <label for="payment_mode">Payment Mode</label>
            <select name="payment_mode" id="payment_mode">
                <option value="0">select</option>
                <option value="cash">CASH</option>
                <option value="cheque">CHEQUE</option>
                <option value="dd">DRAFT</option>
                <option value="upi">UPI</option>
                <option value="online">Online</option>
            </select><br><br>

            <label for="activity">Activity</label>
            <input type="checkbox" name="activity[]" id="" value="dance">
            <label for="dance">Dance</label>
            <input type="checkbox" name="activity[]" id="" value="gym">
            <label for="gym">Gymnastics</label>
            <input type="checkbox" name="activity[]" id="" value="garba">
            <label for="garba">Garba</label>
            <input type="checkbox" name="activity[]" id="" value="zumba">
            <label for="zumba">Zumba</label>
            <input type="checkbox" name="activity[]" id="" value="yoga">
            <label for="yoga">Yoga</label>
            <input type="checkbox" name="activity[]" id="" value="mma">
            <label for="mma">MMA</label><br><br>

            <label for="course">Course</label>
            <input type="radio" name="course" value="3months"><span>3 Months</span>
            <input type="radio" name="course" value="6months"><span>6 Months</span>
            <input type="radio" name="course" value="1year"><span>1 Year</span>
            <input type="radio" name="course" value="vaction"><span>Vacation Batch</span>
            <input type="radio" name="course" value="navratri"><span>Till Navratri</span><br><br>

            <label for="s_date">Starting Date</label>
            <input type="date" name="s_date" value="<?php echo $row['s_date']; ?>"><br><br>

            <label for="e_date">End Date</label>
            <input type="date" name="e_date" value="<?php echo $row['e_date']; ?>"><br><br>

            <label for="pay_amount">Payable Amount</label>
            <input type="text" name="pay_amount" value="<?php echo $row['pay_amount']; ?>"><br><br>

            <label for="total">Total Amount</label>
            <input type="text" name="total" value="<?php echo $row['total']; ?>"><br><br>

            <label for="total_word">Total Amount in Words</label>
            <input type="text" name="total_word" value="<?php echo $row['total_word']; ?>"><br><br>

            <input type="submit" name="update" value="Update">
        </form>
        <?php
    } else {
        echo "Receipt data not found";
    }
} else {
    echo "No receipt ID provided";
}
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-GLhlTQ8iKuOVpL+KGkCL5MdHEabfQxu1c+g7lsF86l/20RS6I5wG5F5iJazExg"
        crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="js/nav.js"></script>
</body>

</html>