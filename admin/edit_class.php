<?php
session_start();
require_once 'connect.php';

if (!isset($_GET['id'])) {
    die("Class ID is required");
}

$id = $_GET['id'];

// Fetch class details
$stmt = $conn->prepare("SELECT * FROM classes WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$class = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $age_group = $_POST['age_group'];
    $timings = $_POST['timings'];
    $days_of_week = $_POST['days_of_week'];
    $description = $_POST['description'];
    $key_points = $_POST['key_points'];

    $stmt = $conn->prepare("UPDATE classes SET title = ?, age_group = ?, timings = ?, days_of_week = ?, description = ?, key_points = ? WHERE id = ?");
    $stmt->bind_param("ssssssi", $title, $age_group, $timings, $days_of_week, $description, $key_points, $id);

    if ($stmt->execute()) {
        header("Location: view_classes.php?message=Class+updated+successfully");
        exit();
    } else {
        echo "Error updating class: " . $conn->error;
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Class</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container my-5">
        <h1 class="text-center mb-4">Edit Class</h1>
        <form action="" method="post">
            <div class="mb-3">
                <label for="title" class="form-label">Class Title</label>
                <input type="text" class="form-control" id="title" name="title" value="<?php echo htmlspecialchars($class['title']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="age_group" class="form-label">Age Group</label>
                <input type="text" class="form-control" id="age_group" name="age_group" value="<?php echo htmlspecialchars($class['age_group']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="timings" class="form-label">Timings</label>
                <input type="text" class="form-control" id="timings" name="timings" value="<?php echo htmlspecialchars($class['timings']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="days_of_week" class="form-label">Days of Week</label>
                <input type="text" class="form-control" id="days_of_week" name="days_of_week" value="<?php echo htmlspecialchars($class['days_of_week']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" required><?php echo htmlspecialchars($class['description']); ?></textarea>
            </div>
            <div class="mb-3">
                <label for="key_points" class="form-label">Key Points</label>
                <textarea class="form-control" id="key_points" name="key_points"><?php echo htmlspecialchars($class['key_points']); ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
    </div>
</body>

</html>
