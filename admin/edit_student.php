<?php
include("connect.php");
include('logout.php');

$id = ""; // Initialize variable to store student ID
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

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Retrieve student information from the database
    $sql = "SELECT * FROM pnp_student WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    
    if(!$row) {
        echo "Student not found!";
        exit;
    }
}

if(isset($_POST['submit'])) {
    // Handle form submission to update student information
    $id = $_POST['id'];
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
    
    if (isset($_POST['gender']))
        $gender = $_POST['gender'];

    if (isset($_FILES['photo']))
        $photo = $_FILES['photo'];

    if (isset($_FILES['idproof']))
        $idproof = $_FILES['idproof'];


    // Handle activity as an array
    if(isset($_POST['activity']) && is_array($_POST['activity'])) {
        $activity = implode(', ', $_POST['activity']);
    } else {
        $activity = "No activities selected"; // Default value if no activities are selected
    }

    
    // Handle file uploads (photo and idproof)
    $photoFileName = $_FILES['photo']['name'];
    $idProofFileName = $_FILES['idproof']['name'];

    // Check if photo was uploaded
    if($photoFileName) {
        $photoTempName = $_FILES['photo']['tmp_name'];
        $photoDestination = "images/" . $photoFileName; // Define your upload directory

        if(move_uploaded_file($photoTempName, $photoDestination)) {
            $photo = $photoFileName;
        } else {
            echo "Error uploading photo.";
        }
    } else {
        $photo = $row['photo'];
    }

    // Check if ID proof was uploaded
    if($idProofFileName) {
        $idProofTempName = $_FILES['idproof']['tmp_name'];
        $idProofDestination = "images/" . $idProofFileName; // Define your upload directory

        if(move_uploaded_file($idProofTempName, $idProofDestination)) {
            $idproof = $idProofFileName;
        } else {
            echo "Error uploading ID proof.";
        }
    } else {
        $idproof = $row['idproof'];
    }

    // Update database
    $sql = "UPDATE pnp_student SET cdate=?, sname=?, age=?, dob=?, mstatus=?, edu=?, occu=?, contact1=?, contact2=?, email=?, addr=?, fname=?, foccu=?, mname=?, moccu=?, hname=?, hoccu=?, jdate=?, course=?, gender=?, activity=?, photo=?, idproof=? WHERE id=?";
    $stmt = mysqli_prepare($conn, $sql);
    
    // Bind parameters
    mysqli_stmt_bind_param($stmt, "ssissssssssssssssssssssi", $cdate, $sname, $age, $dob, $mstatus, $edu, $occu, $contact1, $contact2, $email, $addr, $fname, $foccu, $mname, $moccu, $hname, $hoccu, $jdate, $course, $gender, $activity, $photo, $idproof, $id);
    mysqli_stmt_execute($stmt);
    
    if(mysqli_stmt_affected_rows($stmt) > 0) {
        echo "Student information updated successfully";
        // Redirect or perform further actions
    } else {
        echo "Error updating student information: " . mysqli_error($conn);
    }
    
    mysqli_stmt_close($stmt);
}

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
    <h2>Edit Student</h2>

    <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

        <label for="cdate">Current Date:</label>
        <input type="date" id="cdate" name="cdate" value="<?php echo $row['cdate']; ?>">
        <br><br>

        <label for="sname">Student Name:</label>
        <input type="text" id="sname" name="sname" value="<?php echo $row['sname']; ?>">
        <br><br>


        <!-- Field: Age -->
        <label for="age">Age :</label>
        <input type="number" id="age" name="age" value="<?php echo $row['age']; ?>">
        <br><br>

        <!-- Field: Birth Date -->
        <label for="dob">Birth Date:</label>
        <input type="date" id="dob" name="dob" value="<?php echo $row['dob']; ?>">
        <br><br>

        <!-- Field: Marital Status -->
        <label for="mstatus">Marital Status:</label>
        <select id="mstatus" name="mstatus">
            <option value="unmerried">unmerried</option>
            <option value="merried">Merried</option>
        </select>
        <br><br>

        <!-- Field: Education -->
        <label for="edu">Education:</label>
        <input type="text" id="edu" name="edu" value="<?php echo $row['edu']; ?>">
        <br><br>

        <!-- Field: Occupation -->
        <label for="occu">Occupation:</label>
        <input type="text" id="occu" name="occu" value=" <?php echo $row['occu']; ?>">
        <br><br>

        <!-- Field: Contact 1 -->
        <label for="contact1">Contact 1:</label>
        <input type="text" id="contact1" name="contact1" value="<?php echo $row['contact1']; ?>">
        <br><br>

        <!-- Field: Contact 2 -->
        <label for="contact2">Contact 2:</label>
        <input type="text" id="contact2" name="contact2" value="<?php echo $row['contact2']; ?>">
        <br><br>

        <!-- Field: Email -->
        <label for="email">E-mail:</label>
        <input type="text" id="email" name="email" value="<?php echo $row['email']; ?>">
        <br><br>

        <!-- Field: Address -->
        <label for="addr">Address:</label>
        <input type="textarea" id="addr" name="addr" value="<?php echo $row['addr']; ?>">
        <br><br>

        <label for="fname">Father's Name:</label>
        <input type="text" id="fname" name="fname" value="<?php echo $row['fname']; ?>">
        <br><br>

        <label for="foccu">Father's Occupation:</label>
        <input type="text" id="foccu" name="foccu" value="<?php echo $row['foccu']; ?>">
        <br><br>

        <label for="mname">Mother's Name:</label>
        <input type="text" id="mname" name="mname" value="<?php echo $row['mname']; ?>">
        <br><br>

        <label for="moccu">Mother's Occupation:</label>
        <input type="text" id="moccu" name="moccu" value="<?php echo $row['moccu']; ?>">
        <br><br>

        <label for="hname">Husband's Name:</label>
        <input type="text" id="hname" name="hname" value="<?php echo $row['hname']; ?>">
        <br><br>

        <label for="hoccu">Husband's Occupation:</label>
        <input type="text" id="hoccu" name="hoccu" value="<?php echo $row['hoccu']; ?>">
        <br><br>

        <!-- Field: Date of Joining -->
        <label for="jdate">Date of Joining:</label>
        <input type="date" id="jdate" name="jdate" value="<?php echo $row['jdate']; ?>">
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
        <br><br>


        <label for="gender">Gender :</label>
        <input type="radio" id="male" name="gender" value="male">
        <label for="male">Male</label>
        <input type="radio" id="female" name="gender" value="female">
        <label for="female">Female</label>
        <input type="radio" id="other" name="gender" value="other">
        <label for="other">Other</label>
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
        <br><br>

        <!-- Field: Upload Photo -->
        <label for="photo">Upload Photo:</label>
        <input type="file" id="photo" name="photo">
        <br><br>

        <!-- Field: Upload ID Proof -->
        <label for="idproof">Upload ID Proof:</label>
        <input type="file" id="idproof" name="idproof">
        <br><br>

        <input type="submit" name="submit" value="Update">
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-GLhlTQ8iKuOVpL+KGkCL5MdHEabfQxu1c+g7lsF86l/20RS6I5wG5F5iJazExg"
        crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="js/nav.js"></script>
</body>

</html>