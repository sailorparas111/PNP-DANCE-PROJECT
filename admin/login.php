<?php
include_once("connect.php");

// Start session
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
    $login_username = $_POST["login_username"];
    $login_password = $_POST["login_password"];

    $login_query = "SELECT username, password FROM pnpadmin WHERE username = ?";
    $stmt = mysqli_prepare($conn, $login_query);
    mysqli_stmt_bind_param($stmt, "s", $login_username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);


    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $stored_password = $row['password'];

        if (password_verify($login_password, $stored_password)) {
            // Set username in session
            $_SESSION['username'] = $login_username;
            $_SESSION['loggedin'] = true;
            header("Location: index.php");
            exit();
        } else {
            echo "<p>Invalid username or password.</p>";
        }
    } else {
        echo "<p>Invalid username or password.</p>";
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles_n.css">
    <title>Login</title>
</head>
<body class="bg-login">
    <div class="container">
        <div class="row">
            <div class="col-md-6 justify-content-right login-bg">
                <h2>WELCOME TO</h2>
                <img src="imgs/logo.png" alt="PNPDANCESTUDIO">
                
                <h3>DANCE STUDIO</h3>
                <h4>Please Login as Admin</h4>
            </div>
            <div class="col-md-6 justify-content-right bg-light login">
                <h1 class="text-center">Admin Login</h1>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="mt-3">
                    <div class="mb-3">
                        <label for="login_username" class="form-label">Username:</label>
                        <input type="text" id="login_username" name="login_username" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="login_password" class="form-label">Password:</label>
                        <input type="password" id="login_password" name="login_password" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <input type="submit" name="login" value="Login" class="btn btn-dark">
                        <a href="register.php" class="btn btn-link">Register</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-GLhlTQ8iKuOVpL+KGkCL5MdHEabfQxu1c+g7lsF86l/20RS6I5wG5F5iJazExg" crossorigin="anonymous"></script>
</body>
</html>