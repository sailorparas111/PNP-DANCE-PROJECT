<?php
include_once ("connect.php");
?>

<!DOCTYPE html>
<html lang="en">

<?php

// Check if the ID is provided through URL parameter
if (isset ($_GET['id'])) {
    $id = $_GET['id'];

    // Retrieve specific user's data
    $sql = "SELECT * FROM pnp_student WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {

            ?>

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">

                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

                <link rel="stylesheet" href="css/r_view0.css">

                <title>Bootstrap Icon Sidebar</title>
            </head>

            <body>

                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <img src="imgs/letterhead-02.jpg" alt="">
                            <div class="receipt_title">
                                <h2>ADMISSION FORM</h2>
                            </div>
                        </div>
                    </div>

                    <section>
                        <div class="row">
                            <div class="col-md-8">
                                <h6>Name :</h6><?php echo $row['sname']; ?>
                            </div>

                            <div class="col-md-4">
                                <?php echo $row['id']; ?>
                                <?php echo $row["cdate"]; ?>
                                <?php echo "<img src='images/" . $row['photo'] . "' alt='Photo' width='200' height='400'>";
            ?>
                            </div>

                            <div class="col-md-12">


                                <div class="row declare">
                                    <div class="col-md-8">
                                        <p></p>
                                    </div>
                                    <div class="col-md-4">
                                        <h5>Receiver's Sign</h5>
                                    </div>
                                </div>

                            </div>
                    </section>

                    <div class="row">
                        <div class="col-md-12">
                            <img src="imgs/letterhead-03.jpg" alt="">
                        </div>
                    </div>

                </div>
            </body>
            <?php
            echo "<div class='table-responsive'>";
            echo "<table class='table table-bordered'>";
            // Display user details in a table or any desired format



            echo "<tr><td>Gender</td><td>" . $row['gender'] . "</td>";
            echo "<tr><td>Age</td><td>" . $row['age'] . "</td>";
            echo "<tr><td>Date of Birth</td><td>" . $row['dob'] . "</td>";
            echo "<tr><td>Marital Status</td><td>" . $row["mstatus"] . "</td>";
            echo "<tr><td>Education</td><td>" . $row["edu"] . "</td>";
            echo "<tr><td>Occupation</td><td>" . $row["occu"] . "</td>";
            echo "<tr><td>Contact 01</td><td>" . $row["contact1"] . "</td>";
            echo "<tr><td>Contact 02</td><td>" . $row["contact2"] . "</td>";
            echo "<tr><td>Email</td><td>" . $row["email"] . "</td>";
            echo "<tr><td>Address</td><td>" . $row["addr"] . "</td>";
            echo "<tr><td>Father's Name</td><td>" . $row["fname"] . "</td>";
            echo "<tr><td>Father's Occupation</td><td>" . $row["foccu"] . "</td>";
            echo "<tr><td>Mother's Name</td><td>" . $row["mname"] . "</td>";
            echo "<tr><td>Mother's Occupation</td><td>" . $row["moccu"] . "</td>";
            echo "<tr><td>Husband's Name</td><td>" . $row["hname"] . "</td>";
            echo "<tr><td>Husband's Occupation</td><td>" . $row["hoccu"] . "</td>";
            echo "<tr><td>Date of Joining</td><td>" . $row["jdate"] . "</td>";
            echo "<tr><td>Activity</td><td>" . $row["activity"] . "</td>";
            echo "<tr><td>Course</td><td>" . $row["course"] . "</td>";
            echo "<tr><td>Profile Pic</td><td><img src='images/" . $row['photo'] . "' alt='Photo' width='100'></td>";
            echo "<tr><td>ID Proof</td><td><img src='images/" . $row['idproof'] . "' alt='ID Proof' width='100'></td>";

        }
        echo "</table>";
        echo "</div>";
    } else {
        echo "User not found";
    }
} else {
    echo "No user ID provided";
}

mysqli_close($conn);
?>
<?php

?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-GLhlTQ8iKuOVpL+KGkCL5MdHEabfQxu1c+g7lsF86l/20RS6I5wG5F5iJazExg" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</body>

</html>