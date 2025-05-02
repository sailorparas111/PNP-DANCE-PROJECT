<?php
include("logout.php");
?>

<?php
include_once("connect.php");

$cdate = "";
$sname = "";
$age = "";
$dob = "";
$mstatus = "";
$edu = "";
$occu = "";
$contact1 = "";
$contact2 = "";
$email = "";
$addr = "";
$fname = "";
$foccu = "";
$mname = "";
$moccu = "";
$hname = "";
$hoccu = "";
$jdate = "";
$course = "";

$activity = "";
$gender = "";

$photo = "";
$idproof = "";

$er = 0;


$ecdate = "";
$esname = "";
$eage = "";
$edob = "";
$emstatus = "";
$eedu = "";
$eoccu = "";
$econtact1 = "";
$econtact2 = "";
$eemail = "";
$eaddr = "";
$efname = "";
$efoccu = "";
$emname = "";
$emoccu = "";
$ehname = "";
$ehoccu = "";
$ejdate = "";
$ecourse = "";

$eactivity = "";
$egender = "";

$ephoto = "";
$eidproof = "";


// Process form data and insert into the database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cdate = $_POST['cdate'];
    $sname = $_POST['sname'];
    $age = $_POST['age'];
    $dob = $_POST['dob'];
    $mstatus = $_POST['mstatus'];
    $edu = $_POST['edu'];
    $occu = $_POST['occu'];
    $contact1 = $_POST['contact1'];
    $contact2 = $_POST['contact2'];
    $email = $_POST['email'];
    $addr = $_POST['addr'];
    $fname = $_POST['fname'];
    $foccu = $_POST['foccu'];
    $mname = $_POST['mname'];
    $moccu = $_POST['moccu'];
    $hname = $_POST['hname'];
    $hoccu = $_POST['hoccu'];
    $jdate = $_POST['jdate'];
    $course = $_POST['course'];

    if (isset($_POST['activity']) && is_array($_POST['activity'])) {
        $activity = $_POST['activity'];
        $activities = implode(', ', $activity);
    } else {
        $activities = "No activities selected"; // Default value if no activities are selected
    }

    if (isset($_POST['gender']))
        $gender = $_POST['gender'];

    if (isset($_FILES['photo']))
        $photo = $_FILES['photo'];

    if (isset($_FILES['idproof']))
        $idproof = $_FILES['idproof'];

    if ($cdate == "") {
        $er++;
        $ecdate = "*Required";
    }

    if ($sname == "") {
        $er++;
        $esname = "*Required";
    } else {
        $sname = test_input($sname);
        if (!preg_match("/^[a-zA-Z ]*$/", $sname)) {
            $er++;
            $esname = "*Only letters and white space allowed";
        }
    }
    if ($age == "") {
        $er++;
        $eage = "*Required";
    } else {
        $age = test_input($age);
        if (!preg_match("/^[+0-9]*$/", $age)) {
            $er++;
            $eage = "*Only only numbers allow";
        }
    }
    if ($dob == "") {
        $er++;
        $edob = "*Required";
    }

    if ($mstatus == "") {
        $er++;
        $emstatus = "*Required";
    }

    if ($edu == "") {
        $er++;
        $eedu = "*Required";
    } else {
        $edu = test_input($edu);
        if (!preg_match("/^[a-zA-Z0-9 ]*$/", $edu)) { // Updated regex pattern to allow letters, numbers, and white space
            $er++;
            $eedu = "*Only letters and white space allowed";
        }
    }

    if ($occu == "") {
        $er++;
        $eoccu = "*Required";
    } else {
        $occu = test_input($occu);
        if (!preg_match("/^[a-zA-Z ]*$/", $occu)) {
            $er++;
            $eoccu = "*Only letters and white space allowed";
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

    if ($email == "") {
        $er++;
        $eemail = "*Required";
    } else {
        $email = test_input($email);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $er++;
            $eemail = "*Email format is invalid";
        }

    }

    if ($addr == "") {
        $er++;
        $eaddr = "*Required";
    }

    if ($fname == "") {
        $er++;
        $efname = "*Required";
    }

    if ($mname == "") {
        $er++;
        $emname = "*Required";
    }
    if ($jdate == "") {
        $er++;
        $ejdate = "*Required";
    }
    if ($activity == "") {
        $er++;
        $eactivity = "*Please select activity";
    }

    if (empty($gender)) {
        $er++;
        $egender = "*Gender is required";
    }

    if (empty($course)) {
        $er++;
        $ecourse = "*Course is required";
    }



    $photoFileName = $photo['name'];
    $photoTempName = $photo['tmp_name'];
    $photoDestination = "images/" . $photoFileName; // Define your upload directory

    move_uploaded_file($photoTempName, $photoDestination);

    $idProofFileName = $idproof['name'];
    $idProofTempName = $idproof['tmp_name'];
    $idProofDestination = "images/" . $idProofFileName; // Define your upload directory

    move_uploaded_file($idProofTempName, $idProofDestination);

    if ($er == 0) {

        // SQL query to insert form data into the database
        $sql = "INSERT INTO pnp_student (cdate, sname, gender, age, dob, mstatus, edu, occu, contact1, contact2, email, addr, fname, foccu, mname, moccu, hname, hoccu, jdate, activity, course, photo, idproof)
    VALUES ('$cdate', '$sname', '$gender', '$age', '$dob', '$mstatus', '$edu', '$occu', '$contact1', '$contact2', '$email', '$addr', '$fname', '$foccu', '$mname', '$moccu', '$hname', '$hoccu', '$jdate', '$activities', '$course', '$photoFileName', '$idProofFileName')";


        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
            // header("Location: viewdata.php");
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

        <h1>Admission Form</h1>

        <!-- Field: Current Date -->
        <label for="cdate">Current Date:</label>
        <input type="date" id="cdate" name="cdate">
        <span class="error">
            <?php print $ecdate; ?>
        </span>
        <br><br>

        <!-- Field: Student Name -->
        <label for="sname">Student Name:</label>
        <input type="text" id="sname" name="sname">
        <span class="error">
            <?php print $esname; ?>
        </span>
        <br><br>

        <!-- Field: Gender -->
        <label for="gender">Gender :</label>
        <input type="radio" id="male" name="gender" value="male">
        <label for="male">Male</label>
        <input type="radio" id="female" name="gender" value="female">
        <label for="female">Female</label>
        <input type="radio" id="other" name="gender" value="other">
        <label for="other">Other</label>
        <span class="error">
            <?php print $egender; ?>
        </span>
        <br><br>

        <!-- Field: Age -->
        <label for="age">Age :</label>
        <input type="number" id="age" name="age">
        <span class="error">
            <?php print $eage; ?>
        </span>
        <br><br>


        <!-- Field: Birth Date -->
        <label for="dob">Birth Date:</label>
        <input type="date" id="dob" name="dob">
        <span class="error">
            <?php print $edob; ?>
        </span>
        <br><br>

        <!-- Field: Marital Status -->
        <label for="mstatus">Marital Status:</label>
        <select id="mstatus" name="mstatus">
            <option value="0">------</option>
            <option value="unmerried">unmerried</option>
            <option value="merried">Merried</option>
        </select>
        <span class="error">
            <?php print $emstatus; ?>
        </span>
        <br><br>

        <!-- Field: Education -->
        <label for="edu">Education:</label>
        <input type="text" id="edu" name="edu">
        <span class="error">
            <?php print $eedu; ?>
        </span>
        <br><br>

        <!-- Field: Occupation -->
        <label for="occu">Occupation:</label>
        <input type="text" id="occu" name="occu">
        <span class="error">
            <?php print $eoccu; ?>
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

        <!-- Field: Email -->
        <label for="email">E-mail:</label>
        <input type="text" id="email" name="email">
        <span class="error">
            <?php print $eemail; ?>
        </span>
        <br><br>

        <!-- Field: Address -->
        <label for="addr">Address:</label>
        <textarea id="addr" name="addr"></textarea>
        <span class="error">
            <?php print $eaddr; ?>
        </span>
        <br><br>

        <label for="fname">Father's Name:</label>
        <input type="text" id="fname" name="fname">
        <span class="error">
            <?php print $efname; ?>
        </span>
        <br><br>

        <label for="foccu">Father's Occupation:</label>
        <input type="text" id="foccu" name="foccu">
        <span class="error">
            <?php print $efoccu; ?>
        </span>
        <br><br>

        <label for="mname">Mother's Name:</label>
        <input type="text" id="mname" name="mname">
        <span class="error">
            <?php print $emname; ?>
        </span>
        <br><br>

        <label for="moccu">Mother's Occupation:</label>
        <input type="text" id="moccu" name="moccu">
        <span class="error">
            <?php print $emoccu; ?>
        </span>
        <br><br>

        <label for="hname">Husband's Name:</label>
        <input type="text" id="hname" name="hname">
        <span class="error">
            <?php print $ehname; ?>
        </span>
        <br><br>

        <label for="hoccu">Husband's Occupation:</label>
        <input type="text" id="hoccu" name="hoccu">
        <span class="error">
            <?php print $ehoccu; ?>
        </span>
        <br><br>

        <!-- Field: Date of Joining -->
        <label for="jdate">Date of Joining:</label>
        <input type="date" id="jdate" name="jdate">
        <span class="error">
            <?php print $ejdate; ?>
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

        <label for="course">Duration of Course:</label>
        <select id="course" name="course">
            <option value="3 Months">3 Months</option>
            <option value="6 Months">6 Months</option>
            <option value="1 Year">1 Year</option>
            <option value="Vacation Batch">Vacation Batch</option>
            <option value="Till Navratri">Till Navratri</option>
        </select>
        <span class="error">
            <?php print $ecourse; ?>
        </span>
        <br><br>

        <!-- Field: Upload Photo -->
        <label for="photo">Upload Photo:</label>
        <input type="file" id="photo" name="photo">
        <span class="error">
            <?php print $ephoto; ?>
        </span>
        <br><br>

        <!-- Field: Upload ID Proof -->
        <label for="idproof">Upload ID Proof:</label>
        <input type="file" id="idproof" name="idproof">
        <span class="error">
            <?php print $eidproof; ?>
        </span>
        <br><br>

        <input type="submit" value="Submit">
    </form>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-GLhlTQ8iKuOVpL+KGkCL5MdHEabfQxu1c+g7lsF86l/20RS6I5wG5F5iJazExg"
        crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="js/nav.js"></script>
</body>

</html>