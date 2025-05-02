<?php
session_start();

if (isset($_POST['logout'])) {
    // Unset all of the session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Redirect to the login page after logout
    header("Location: login.php");
    exit();
}

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home Page</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<header>
    <nav>
        <ul>
            <li><a href="#" class="active">HOME</a></li>
            <li><a href="admission.php">ADMISSION</a></li>
            <li><a href="viewdata.php">View Student Data</a></li>
            <li><a href="inquiry.php">Inquiry</a></li>
            <li><a href="attendance.php">Attendance</a></li>
            <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) { ?>
                <li>
                    <form method="post" action="">
                        <input type="submit" name="logout" value="Logout">
                    </form>
                </li>
            <?php } ?>
        </ul>
    </nav>
</header>

<main>
    <h1>Welcome to Our Website</h1>
    <p>This is the home page content. Feel free to explore!</p>
</main>

</body>
</html>
