<?php
// Start session
session_start();

// Include database connection
require_once 'admin/connect.php';

// Check login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Get user ID
$user_id = $_SESSION['user_id'];

// Fetch user details
$query = "SELECT * FROM users WHERE id = ?";
$stmt = $conn->prepare($query);

if ($stmt) {
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();
    } else {
        echo "User not found.";
        exit();
    }
    $stmt->close();
} else {
    die("Query preparation failed: " . $conn->error);
}

// Handle update form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fname = trim($_POST['fname']);
    $lname = trim($_POST['lname']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $address = trim($_POST['address']);
    $bio = trim($_POST['bio']);

    // Handle profile picture upload
    $profile_pic = $user['profile_pic'];
    if (isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] == 0) {
        $targetDir = "uploads/";
        $fileName = uniqid() . "_" . basename($_FILES['profile_pic']['name']);
        $targetFilePath = $targetDir . $fileName;
        $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

        $allowedTypes = array('jpg', 'jpeg', 'png', 'gif');
        if (in_array($fileType, $allowedTypes)) {
            move_uploaded_file($_FILES['profile_pic']['tmp_name'], $targetFilePath);
            $profile_pic = $fileName;
        }
    }

    // Update query
    $update = $conn->prepare("UPDATE users SET fname=?, lname=?, email=?, phone=?, address=?, bio=?, profile_pic=? WHERE id=?");
    $update->bind_param("sssssssi", $fname, $lname, $email, $phone, $address, $bio, $profile_pic, $user_id);
    
    if ($update->execute()) {
        header("Location: profile.php");
        exit();
    } else {
        echo "Failed to update profile.";
    }
}

$conn->close();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile - PNP Dance Studio</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Rajdhani&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/st-index.css">
</head>

<body>

<?php include("nav.php"); ?>
<?php include("model.php"); ?>

<main class="container">
    <div class="profile-card">
        <h2>Edit Your Profile</h2>
        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label>First Name:</label>
                <input type="text" name="fname" class="form-control" value="<?php echo htmlspecialchars($user['fname']); ?>" required>
            </div>
            <div class="mb-3">
                <label>Last Name:</label>
                <input type="text" name="lname" class="form-control" value="<?php echo htmlspecialchars($user['lname']); ?>" required>
            </div>
            <div class="mb-3">
                <label>Email:</label>
                <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($user['email']); ?>" required>
            </div>
            <div class="mb-3">
                <label>Phone:</label>
                <input type="text" name="phone" class="form-control" value="<?php echo htmlspecialchars($user['phone']); ?>" required>
            </div>
            <div class="mb-3">
                <label>Address:</label>
                <input type="text" name="address" class="form-control" value="<?php echo htmlspecialchars($user['address']); ?>" required>
            </div>
            <div class="mb-3">
                <label>Bio:</label>
                <textarea name="bio" class="form-control" required><?php echo htmlspecialchars($user['bio']); ?></textarea>
            </div>
            <div class="mb-3">
                <label>Profile Picture:</label><br>
                <?php
                $profilePic = !empty($user['profile_pic']) ? 'uploads/' . htmlspecialchars($user['profile_pic']) : 'images/default-profile.png';
                ?>
                <img src="<?php echo $profilePic; ?>" alt="Profile Picture" style="width:100px; height:100px; border-radius:50%; margin-bottom:10px;">
                <input type="file" name="profile_pic" class="form-control mt-2">
            </div>
            <button type="submit" class="btn btn-success">Update Profile</button>
            <a href="profile.php" class="btn btn-secondary ms-2">Cancel</a>
        </form>
    </div>
</main>

<?php include("footer.php"); ?>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
