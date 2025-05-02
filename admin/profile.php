<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/profile01.css">
</head>

<body>

    <div class="container">
        <?php
        include_once ("connect.php");

        // Check if the ID is provided through URL parameter
        if (isset($_GET['id'])) {
            $id = mysqli_real_escape_string($conn, $_GET['id']);

            // Retrieve specific user's data
            $sql = "SELECT * FROM pnp_student WHERE id = $id";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>

                    <header class="header">
                        <img src="imgs/letterhead-02.jpg" alt="Logo" class="logo">
                    </header>

                    <section class="">
                        <div class="row">
                            <div class="col-md-4">
                                <h4 class="tdata-h">ADMISSION FORM</h4>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8">
                                <p>Sr. No. : PNP2024-
                                    <?php echo ($row['id']); ?>
                                </p>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-6 tdata-h">Date</div>
                                    <div class="col-md-6 content">
                                        <p>
                                            <?php echo ($row['cdate']); ?>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-9">
                                <div class="row ">
                                    <div class="col-md-3 height-content">
                                        <p class="tdata-h">Name</p>
                                    </div>
                                    <div class="col-md-9 content">
                                        <p>
                                            <?php echo $row['sname']; ?>
                                        </p>
                                    </div>

                                    <div class="col-md-3 height-content">
                                        <p class="tdata-h">Gender</p>
                                    </div>
                                    <div class="col-md-3 content">
                                        <p>
                                            <?php echo $row['gender']; ?>
                                        </p>
                                    </div>
                                    <div class="col-md-3 height-content">
                                        <p class="tdata-h">Age</p>
                                    </div>
                                    <div class="col-md-3 content">
                                        <p>
                                            <?php echo $row['age']; ?>
                                        </p>
                                    </div>

                                    <div class="col-md-3 height-content">
                                        <p class="tdata-h">Education</p>
                                    </div>
                                    <div class="col-md-9 content">
                                        <p>
                                            <?php echo $row['edu']; ?>
                                        </p>
                                    </div>

                                    <div class="col-md-3 height-content">
                                        <p class="tdata-h">Occupation</p>
                                    </div>
                                    <div class="col-md-9 content">
                                        <p>
                                            <?php echo $row['occu']; ?>
                                        </p>
                                    </div>

                                    <div class="col-md-3 height-content">
                                        <p class="tdata-h">Date of Birth</p>
                                    </div>
                                    <div class="col-md-3 content">
                                        <p>
                                            <?php echo $row['dob']; ?>
                                        </p>
                                    </div>
                                    <div class="col-md-3 height-content">
                                        <p class="tdata-h">Marital Status</p>
                                    </div>
                                    <div class="col-md-3 content">
                                        <p>
                                            <?php echo $row['mstatus']; ?>
                                        </p>
                                    </div>

                                </div>

                            </div>

                            <div class="col-md-3  profile-image">
                                <?php echo "<img src='images/" . $row['photo'] . "' alt='Photo'> ";
                                ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3 height-content">
                                <p class="tdata-h">Contact</p>
                            </div>
                            <div class="col-md-9 content">
                                <p>
                                    <?php echo $row['contact1']; ?>,
                                    <?php echo $row['contact2']; ?>
                                </p>
                            </div>

                            <div class="col-md-3 height-content">
                                <p class="tdata-h">Address</p>
                            </div>
                            <div class="col-md-9 content">
                                <p>
                                    <?php echo $row['addr']; ?>
                                </p>
                            </div>

                            <div class="col-md-3 height-content">
                                <p class="tdata-h">Father's Name</p>
                            </div>
                            <div class="col-md-9 content">
                                <p>
                                    <?php echo $row['fname']; ?>
                                </p>
                            </div>
                            <div class="col-md-3 height-content">
                                <p class="tdata-h">Father's Occupation</p>
                            </div>
                            <div class="col-md-3 content">
                                <p>
                                    <?php echo $row['foccu']; ?>
                                </p>
                            </div>
                            <div class="col-md-3 height-content">
                                <p class="tdata-h">Contact</p>
                            </div>
                            <div class="col-md-3 content">
                                <p>
                                    <?php echo $row['contact2']; ?>
                                </p>
                            </div>

                            <div class="col-md-3 height-content">
                                <p class="tdata-h">Mother's Name</p>
                            </div>
                            <div class="col-md-9  content height-content">
                                <p>
                                    <?php echo $row['mname']; ?>
                                </p>
                            </div>
                            <div class="col-md-3 height-content">
                                <p class="tdata-h">Mother's Occupation</p>
                            </div>
                            <div class="col-md-3 content">
                                <p>
                                    <?php echo $row['moccu']; ?>
                                </p>
                            </div>
                            <div class="col-md-3 height-content">
                                <p class="tdata-h">Contact</p>
                            </div>
                            <div class="col-md-3  content">
                                <p>
                                    <?php echo $row['contact1']; ?>
                                </p>
                            </div>

                            <div class="col-md-3 height-content">
                                <p class="tdata-h">Husband's Name</p>
                            </div>
                            <div class="col-md-9  content">
                                <p>
                                    <?php echo $row['hname']; ?>
                                </p>
                            </div>
                            <div class="col-md-3 height-content">
                                <p class="tdata-h">Husband's Occupation</p>
                            </div>
                            <div class="col-md-3  content height-content">
                                <p>
                                    <?php echo $row['hoccu']; ?>
                                </p>
                            </div>
                            <div class="col-md-3 height-content">
                                <p class="tdata-h">Contact</p>
                            </div>
                            <div class="col-md-3">
                                <p>
                                    <?php //echo $row[''];   ?>
                                </p>
                            </div>

                            <div class="row main">
                                <div class="col-md-4">
                                    <h4 class="tdata-h">For Office Use Only</h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 height-content">
                                    <p class="tdata-h">Date of Joining</p>
                                </div>
                                <div class="col-md-3 content height-content">
                                    <p>
                                        <?php echo $row['jdate']; ?>
                                    </p>
                                </div>
                                <div class="col-md-3 height-content">
                                    <p class="tdata-h">Course Duration</p>
                                </div>
                                <div class="col-md-3 content">
                                    <p>
                                        <?php echo $row['course']; ?>
                                    </p>
                                </div>

                                <div class="col-md-3 height-content">
                                    <p class="tdata-h">Activity</p>
                                </div>
                                <div class="col-md-3  content height-content">
                                    <p>
                                        <?php echo $row['activity']; ?>
                                    </p>
                                </div>
                                <div class="col-md-3 height-content">
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <h4 class="tdata-h">For Office Use Only</h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 height-content">
                                    <p class="tdata-h">Date of Joining</p>
                                </div>
                                <div class="col-md-3 content height-content">
                                    <p>
                                        <?php echo $row['jdate']; ?>
                                    </p>
                                </div>
                                <div class="col-md-3 height-content">
                                    <p class="tdata-h">Course Duration</p>
                                </div>
                                <div class="col-md-3 content">
                                    <p>
                                        <?php echo $row['course']; ?>
                                    </p>
                                </div>

                                <div class="col-md-3 height-content">
                                    <p class="tdata-h">Activity</p>
                                </div>
                                <div class="col-md-3  content height-content">
                                    <p>
                                        <?php echo $row['activity']; ?>
                                    </p>
                                </div>
                                <div class="col-md-3 height-content">
                                </div>

                            </div>

                        </div>

                    </section>

                    <footer class="header">
                        <img src="imgs/letterhead-03.jpg" alt="Logo" class="logo">
                    </footer>

                </div>
                <?php
                }
            } else {
                echo "<p class='error'>User not found</p>";
            }
        } else {
            echo "<p class='error'>No user ID provided</p>";
        }

        mysqli_close($conn);
        ?>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>