<?php
include_once("connect.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Retrieve specific user's data
    $sql = "SELECT * FROM pnp_student WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Fetch user details
        $row = mysqli_fetch_assoc($result);
?>
        <h1>User Details</h1>
        <!-- Display user details -->
        <p>Student ID: <?php echo $row['id']; ?></p>
        <p>Student Name: <?php echo $row['sname']; ?></p>
        <!-- Display other details -->
        
        <form action="" method="POST">
            <!-- Input fields filled with user data -->
            <input type="hidden" name="sid" value="<?php echo $row['id']; ?>">
            <label for="sname">Student Name:</label>
            <input type="text" name="sname" value="<?php echo $row['sname']; ?>"><br><br>
            <!-- Include other fields similarly -->

            <!-- Other fields for receipt data -->
            <label for="receipt_no">Receipt No.</label>
            <input type="number" name="receipt_no"><br><br>

            <label for="payment_mode">Payment Mode</label>
            <select name="payment_mode" id="payment_mode">
                <option value="0">select</option>
                <option value="cash">CASH</option>
                <option value="cheque">CHEQUE</option>
                <!-- Other options -->
            </select><br><br>

            <!-- Include other receipt fields as needed -->

            <input type="submit" name="submit" value="Submit Receipt">
        </form>

<?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $sid = $_POST['sid'];
            $sname = $_POST['sname'];
            $receipt_no = $_POST['receipt_no'];
            $payment_mode = $_POST['payment_mode'];
            // Fetch other form data

            // Perform insertion into receipt_table
            // The SQL insertion query should be similar to previous examples
            
            // Redirect or display success message accordingly
        }
    } else {
        echo "User not found";
    }
} else {
    echo "No user ID provided";
}

mysqli_close($conn);
?>
