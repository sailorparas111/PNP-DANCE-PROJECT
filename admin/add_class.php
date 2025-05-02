<?php
session_start();
require_once 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $age_group = $_POST['age_group'];
    $timings = $_POST['timings'];
    $days_of_week = $_POST['days_of_week'];
    $description = $_POST['description'];
    $key_points = $_POST['key_points'];
    $image = $_FILES['image'];

    // Handle image upload
    $uploadDir = '../uploads/';
    $imagePath = $uploadDir . basename($image['name']);
    if (move_uploaded_file($image['tmp_name'], $imagePath)) {
        $imageUrl = 'uploads/' . basename($image['name']);
    } else {
        die('Image upload failed.');
    }

    // Insert into database
    $stmt = $conn->prepare("INSERT INTO classes (title, age_group, timings, days_of_week, description, key_points, image) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $title, $age_group, $timings, $days_of_week, $description, $key_points, $imageUrl);

    if ($stmt->execute()) {
        echo "Class added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
}
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
include('side_navbar.php');
?>

    <div class="container">

    <h1>Add Classes</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="title">Class Title:</label>
        <input type="text" name="title" id="title" required><br>

        <label for="age_group">Age Group:</label>
        <input type="text" name="age_group" id="age_group" required><br>

        <label for="timings">Timings:</label>
        <input type="text" name="timings" id="timings" required><br>

        <label for="days_of_week">Days of Week:</label>
        <input type="text" name="days_of_week" id="days_of_week" required><br>

        <label for="description">Description:</label>
        <textarea name="description" id="description" required></textarea><br>

        <label for="key_points">Key Points (comma-separated):</label>
        <textarea name="key_points" id="key_points"></textarea><br>

        <label for="image">Class Image:</label>
        <input type="file" name="image" id="image" required><br>

        <button type="submit">Add Class</button>
    </form>
    </div>

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-GLhlTQ8iKuOVpL+KGkCL5MdHEabfQxu1c+g7lsF86l/20RS6I5wG5F5iJazExg"
        crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="js/nav.js"></script>
</body>

</html>
