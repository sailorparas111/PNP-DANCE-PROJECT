<?php
include('connect.php');
include('logout.php');


// Check if the ID is provided through URL parameter
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Retrieve specific user's data
    $sql = "SELECT * FROM pnp_student WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Fetch user details
        $row = mysqli_fetch_assoc($result);
        ?>
        <?php

        $sid = "";
        $sname = "";
        $cdate = "";
        $contact1 = "";
        $contact2 = "";
        $addr = "";
        $receipt_no = "";
        $payment_mode = "";
        $activity = "";
        $course = "";
        $s_date = "";
        $e_date = "";
        $pay_amount = "";
        $total = "";
        $total_word = "";

        $er = 0;

        $esname = "";
        $ecdate = "";
        $econtact1 = "";
        $econtact2 = "";
        $eaddr = "";
        $ereceipt_no = "";
        $epayment_mode = "";
        $eactivity = "";
        $ecourse = "";
        $es_date = "";
        $ee_date = "";
        $epay_amount = "";
        $etotal = "";
        $etotal_word = "";

        function test_input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }


        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $sid = $_POST['sid'];
            $sname = $_POST['sname'];
            $cdate = $_POST['cdate'];
            $contact1 = $_POST['contact1'];
            $contact2 = $_POST['contact2'];
            $addr = $_POST['addr'];
            $receipt_no = $_POST['receipt_no'];
            $payment_mode = $_POST['payment_mode'];

            if (isset($_POST['activity']) && is_array($_POST['activity'])) {
                $activity = $_POST['activity'];
                $activities = implode(', ', $activity);
            } else {
                $activities = "No activities selected"; // Default value if no activities are selected
            }

            if (isset($_POST['course']))
                $course = $_POST['course'];

            $s_date = $_POST['s_date'];
            $e_date = $_POST['e_date'];
            $pay_amount = $_POST['pay_amount'];
            $total = $_POST['total'];
            $total_word = $_POST['total_word'];

            if ($cdate == "") {
                $er++;
                $ecdate = "*Required";
            } else {
                $ecdate = test_input($cdate);
            }

            if ($receipt_no == "") {
                $er++;
                $ereceipt_no = "*Required";
            } else {
                $receipt_no = test_input($receipt_no);
                if (!preg_match("/^[+0-9]*$/", $receipt_no)) {
                    $er++;
                    $ereceipt_no = "*Only only numbers allow";
                }
            }
            if (empty($payment_mode)) {
                $er++;
                $epayment_mode = "*Course is required";
            } else {
                $epayment_mode = test_input($payment_mode);
            }
            if ($activity == "") {
                $er++;
                $eactivity = "*Please select activity";
            }

            if (empty($course)) {
                $er++;
                $ecourse = "*Course is required";
            } else {
                $ecourse = test_input($course);
            }
            if ($s_date == "") {
                $er++;
                $es_date = "*Required";
            } else {
                $es_date = test_input($s_date);
            }
            if ($e_date == "") {
                $er++;
                $ee_date = "*Required";
            } else {
                $ee_date = test_input($e_date);
            }
            if ($pay_amount == "") {
                $er++;
                $epay_amount = "*Required";
            }

            if ($total == "") {
                $er++;
                $etotal = "*Required";
            } else {
                $total = test_input($total);
                if (!preg_match("/^[+0-9]*$/", $total)) {
                    $er++;
                    $etotal = "*Only only numbers allow";
                }
            }
            if ($total_word == "") {
                $er++;
                $etotal_word = "*Required";
            } else {
                $total_word = test_input($total_word);
                if (!preg_match("/^[a-zA-Z ]*$/", $total_word)) {
                    $er++;
                    $etotal_word = "*Only letters and white space allowed";
                }
            }





            if ($er == 0) {
                $sql = "INSERT INTO receipt_table (student_id, sname, contact1, contact2, addr, cdate, receipt_no, payment_mode,
    activity, course, s_date, e_date, pay_amount, total, total_word) 
    VALUES ('$sid', '$sname', '$contact1','$contact2','$addr','$cdate','$receipt_no',
    '$payment_mode', '$activities', '$course', '$s_date', '$e_date', '$pay_amount', '$total', '$total_word')";
                if (mysqli_query($conn, $sql)) {
                    echo "Receipt data inserted successfully";

                    //header("Location: view_receipt.php?receipt_no=$receipt_no");
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            }

        }


        mysqli_close($conn);

    } else {
        echo "User not found";
    }
} else {
    echo "No user ID provided";
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
include('side_navbar.php');
?>
    
<h1>User Details</h1>

<form action="" method="POST">
    <!-- Input fields filled with user data -->
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
    <!-- Include other fields similarly -->

    <!-- Other fields for receipt data -->
    <label for="receipt_details">Receipt Details:</label><br><br>
    <!-- Add other fields as needed -->

    <label for="cdate">Date</label>
    <input type="date" name="cdate" value="">
    <span class="error">
        <?php print $ecdate; ?>
    </span><br><br>

    <label for="receipt_no">Receipt No.</label>
    <input type="number" name="receipt_no">
    <span class="error">
        <?php print $ereceipt_no; ?>
    </span><br><br>

    <label for="payment_mode">Payment Mode</label>
    <select name="payment_mode" id="payment_mode">
        <option value="0">select</option>
        <option value="cash">CASH</option>
        <option value="cheque">CHEQUE</option>
        <option value="dd">DRAFT</option>
        <option value="upi">UPI</option>
        <option value="online">Online</option>
    </select>
    <span class="error">
        <?php print $epayment_mode; ?>
    </span><br><br>

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
    <label for="mma">MMA</label>
    <span class="error">
        <?php print $eactivity; ?>
    </span><br><br>

    <label for="course">Course</label>
    <input type="radio" name="course" value="3months"><span>3 Months</span>
    <input type="radio" name="course" value="6months"><span>6 Months</span>
    <input type="radio" name="course" value="1year"><span>1 Year</span>
    <input type="radio" name="course" value="vaction"><span>Vacation Batch</span>
    <input type="radio" name="course" value="navratri"><span>Till Navratri</span>
    <span class="error">
        <?php print $ecourse; ?>
    </span><br><br>

    <label for="s_date">Starting Date</label>
    <input type="date" name="s_date" value="">
    <span class="error">
        <?php print $es_date; ?>
    </span><br><br>

    <label for="e_date">End Date</label>
    <input type="date" name="e_date" value="">
    <span class="error">
        <?php print $ee_date; ?>
    </span><br><br>

    <label for="pay_amount">Payable Amount</label>
    <input type="text" name="pay_amount" value="">
    <span class="error">
        <?php print $epay_amount; ?>
    </span><br><br>

    <label for="total">Total Amount</label>
    <input type="text" name="total" value="">
    <span class="error">
        <?php print $etotal_word; ?>
    </span><br><br>

    <label for="total_word">Total Amount in Words</label>
    <input type="text" name="total_word" value="">
    <span class="error">
        <?php print $etotal_word; ?>
    </span><br><br>

    <input type="submit" name="submit" value="Submit">
</form>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-GLhlTQ8iKuOVpL+KGkCL5MdHEabfQxu1c+g7lsF86l/20RS6I5wG5F5iJazExg"
        crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="js/nav.js"></script>
</body>

</html>