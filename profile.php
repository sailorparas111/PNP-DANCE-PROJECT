<?php
session_start();
require_once 'admin/connect.php';

// Check login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

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

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Profile - PNP Dance Studio</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Rajdhani&display=swap" rel="stylesheet">

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- FontAwesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

  <!-- Custom Profile CSS -->
  <link rel="stylesheet" href="css/st-profile00.css">

</head>

<body>

<div class="profile-card">

  <!-- Banner -->
  <div class="profile-banner"></div>

  <!-- Nested Profile Info Card -->
  <div class="card profile-info-card">
    <div class="card-body">
      <div class="profile-info">
        <?php
        $profilePic = !empty($user['profile_pic']) ? 'uploads/' . htmlspecialchars($user['profile_pic']) : 'images/default-profile.png';
        ?>
        <img src="<?php echo $profilePic; ?>" class="profile-pic" alt="Profile Picture">
        <div class="profile-details">
          <h3><?php echo htmlspecialchars($user['fname'] . ' ' . $user['lname']); ?></h3>
          <p class="text-muted"><?php echo htmlspecialchars($user['profession'] ?? 'Dancer'); ?></p>
          <button class="follow-btn">Follow</button>
        </div>
      </div>
    </div>
  </div>


  <!-- Nested Stats Card -->
  <div class="card stats-card mt-4">
    <div class="card-body">
      <div class="stats">
        <div>
          <h6>Followers</h6>
          <p>154K</p>
        </div>
        <div>
          <h6>Following</h6>
          <p>20K</p>
        </div>
        <div>
          <h6>Posts</h6>
          <p>103</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Nested Details Card -->
  <div class="card details-card mt-4">
    <div class="card-body">
      <div class="details">
        <div class="icon-text">
          <i class="fas fa-calendar-alt"></i>
          <span>Joined <?php echo date('F, Y', strtotime($user['created_at'] ?? 'now')); ?></span>
        </div>
        <div class="icon-text">
          <i class="fas fa-map-marker-alt"></i>
          <span><?php echo htmlspecialchars($user['address'] ?? 'Location not set'); ?></span>
        </div>
        <div class="icon-text">
          <i class="fas fa-envelope"></i>
          <span><?php echo htmlspecialchars($user['email']); ?></span>
        </div>
        <div class="icon-text">
          <i class="fas fa-phone"></i>
          <span><?php echo htmlspecialchars($user['phone'] ?? 'Phone not set'); ?></span>
        </div>
        <div class="icon-text">
          <i class="fas fa-globe"></i>
          <span><?php echo htmlspecialchars($user['website'] ?? 'Website not set'); ?></span>
        </div>

        <div class="mt-3">
          <h5>About</h5>
          <div class="about-box">
            <?php echo nl2br(htmlspecialchars($user['bio'] ?? 'No bio added yet.')); ?>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
