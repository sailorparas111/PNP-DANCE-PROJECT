<?php
include("logout.php");
?>

<?php
include_once("connect.php");

$cdate = "";
$name = "";
$iq_for = "";
$age = "";
$contact1 = "";
$contact2 = "";
$ref = "";
$remark = "";
$activity = "";

$er = 0;

$ecdate = "";
$ename = "";
$eiq_for = "";
$eage = "";
$econtact1 = "";
$econtact2 = "";
$eref = "";
$eremark = "";

$eactivity = "";

// Process form data and insert into the database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cdate = $_POST['cdate'];
    $name = $_POST['name'];
    $iq_for = $_POST['iq_for'];
    $age = $_POST['age'];
    $contact1 = $_POST['contact1'];
    $contact2 = $_POST['contact2'];
    $ref = $_POST['ref'];
    $remark = $_POST['remark'];

    if (isset($_POST['activity']) && is_array($_POST['activity'])) {
        $activity = $_POST['activity'];
        $activities = implode(', ', $activity);
    } else {
        $activities = "No activities selected"; // Default value if no activities are selected
    }


    if ($cdate == "") {
        $er++;
        $ecdate = "*Required";
    } else {
        $cdate = test_input($cdate);
    }
    if ($name == "") {
        $er++;
        $ename = "*Required";
    } else {
        $name = test_input($name);
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $er++;
            $ename = "*Only letters and white space allowed";
        }
    }
    if ($iq_for == "") {
        $er++;
        $eiq_for = "*Required";
    } else {
        $iq_for = test_input($iq_for);
        if (!preg_match("/^[a-zA-Z ]*$/", $iq_for)) {
            $er++;
            $eiq_for = "*Only letters and white space allowed";
        }
    }
    if ($age == "") {
        $er++;
        $eage = "*Required";
    } else {
        $age = test_input($age);
        if (!preg_match("/^[+0-9]*$/", $age)) {
            $er++;
            $age = "*Only only numbers allow";
        }
    }
    if ($contact1 == "") {
        $er++;
        $econtact1 = "*Required";
    } else {
        $contact1 = test_input($contact1);
        if (!preg_match("/^[+0-9]*$/", $contact1)) {
            $er++;
            $econtact1 = "*Only numbers are allowed";
        }

    }

    if ($contact2 == "") {
        $er++;
        $econtact2 = "*Required";
    } else {
        $contact2 = test_input($contact2);
        if (!preg_match("/^[+0-9]*$/", $contact2)) {
            $er++;
            $econtact2 = "*Only numbers are allowed";
        }

    }

    if ($er == 0) {

        // SQL query to insert form data into the database
        $sql = "INSERT INTO inquiry (cdate, iq_name, iq_for, age, contact1, contact2, reference, remark, activity)
    VALUES ('$cdate', '$name', '$iq_for', '$age', '$contact1', '$contact2', '$ref', '$remark', '$activities')";


        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";

            header("Location:  view_inquiry.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Close the database connection
mysqli_close($conn);
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
        <form action="" method="post" enctype="multipart/form-data">

        <h1>Inquiry Form</h1>

        <label for="cdate">Current Date:</label>
        <input type="date" id="cdate" name="cdate">
        <span class="error">
            <?php print $ecdate; ?>
        </span>
        <br><br>

        <label for="name">Inqiry Person:</label>
        <input type="text" id="name" name="name">
        <span class="error">
            <?php print $ename; ?>
        </span>
        <br><br>

        <label for="iq_for">Inquiry for:</label>
        <input type="text" id="iq_for" name="iq_for">
        <span class="error">
            <?php print $eiq_for; ?>
        </span>
        <br><br>

        <label for="age">Age :</label>
        <input type="number" id="age" name="age">
        <span class="error">
            <?php print $eage; ?>
        </span>
        <br><br>

        <!-- Field: Contact 1 -->
        <label for="contact1">Contact 1:</label>
        <input type="text" id="contact1" name="contact1">
        <span class="error">
            <?php print $econtact1; ?>
        </span>
        <br><br>

        <!-- Field: Contact 2 -->
        <label for="contact2">Contact 2:</label>
        <input type="text" id="contact2" name="contact2">
        <span class="error">
            <?php print $econtact2; ?>
        </span>
        <br><br>

        <label for="activity">Activities:</label><br>
        <input type="checkbox" id="dance" name="activity[]" value="Dance">
        <label for="dance">Dance</label>

        <input type="checkbox" id="gymnastics" name="activity[]" value="Gymnastics">
        <label for="gymnastics">Gymnastics</label>

        <input type="checkbox" id="garba" name="activity[]" value="garba">
        <label for="garba">Garba</label>

        <input type="checkbox" id="zumba" name="activity[]" value="zumba">
        <label for="zumba">Zumba</label>

        <input type="checkbox" id="yoga" name="activity[]" value="yoga">
        <label for="yoga">Yoga</label>

        <input type="checkbox" id="mma" name="activity[]" value="mma">
        <label for="mma">MMA</label>
        <span class="error">
            <?php print $eactivity; ?>
        </span>
        <br><br>

        <label for="ref">Reference:</label>
        <input type="text" id="ref" name="ref">
        <span class="error">
            <?php print $eref; ?>
        </span>
        <br><br>

        <label for="remark">Remark:</label>
        <textarea id="remark" name="remark"></textarea>
        <span class="error">
            <?php print $eremark; ?>
        </span><br><br>

        <input type="submit" value="Submit">
    </form>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-GLhlTQ8iKuOVpL+KGkCL5MdHEabfQxu1c+g7lsF86l/20RS6I5wG5F5iJazExg"
            crossorigin="anonymous"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <script src="js/nav.js"></script>
    </body>

</html>

