<?php
include_once("connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"])) {
    $reg_username = $_POST["reg_username"];
    $reg_password = $_POST["reg_password"];

    $check_query = "SELECT username FROM pnpadmin WHERE username = ?";
    $stmt = mysqli_prepare($conn, $check_query);
    mysqli_stmt_bind_param($stmt, "s", $reg_username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) > 0) {
        echo "<p>Username already exists. Please choose a different username.</p>";
    } else {
        $hashed_password = password_hash($reg_password, PASSWORD_DEFAULT);

        $insert_query = "INSERT INTO pnpadmin (username, password) VALUES (?, ?)";
        $stmt = mysqli_prepare($conn, $insert_query);
        mysqli_stmt_bind_param($stmt, "ss", $reg_username, $hashed_password);

        if (mysqli_stmt_execute($stmt)) {
            echo "<p>User registered successfully!</p>";
        } else {
            echo "<p>Error: Registration failed.</p>";
        }
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>User Registration</title>
</head>
<body class="bg-light">
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <h1 class="text-center">User Registration</h1>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="mt-3">
                    <div class="mb-3">
                        <label for="reg_username" class="form-label">Username:</label>
                        <input type="text" id="reg_username" name="reg_username" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="reg_password" class="form-label">Password:</label>
                        <input type="password" id="reg_password" name="reg_password" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <input type="submit" name="register" value="Register" class="btn btn-primary">
                    </div>
                </form>
                <p class="text-center">Already registered? <a href="login.php">Login here</a></p>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-GLhlTQ8iKuOVpL+KGkCL5MdHEabfQxu1c+g7lsF86l/20RS6I5wG5F5iJazExg" crossorigin="anonymous"></script>
</body>
</html>
