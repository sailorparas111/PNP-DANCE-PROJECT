<?php
session_start();
require_once 'connect.php';

// Handle Delete Request
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $stmt = $conn->prepare("DELETE FROM classes WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: view_class.php?message=Class+deleted+successfully");
        exit();
    } else {
        echo "Error deleting class: " . $conn->error;
    }
}

// Fetch Classes
$query = "SELECT * FROM classes ORDER BY created_at DESC";
$result = $conn->query($query);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Classes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container my-5">
        <h1 class="text-center mb-4">Manage Classes</h1>

        <?php if (isset($_GET['message'])): ?>
            <div class="alert alert-success">
                <?php echo htmlspecialchars($_GET['message']); ?>
            </div>
        <?php endif; ?>

        <div class="text-end mb-3">
            <a href="add_class.php" class="btn btn-primary">Add New Class</a>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Age Group</th>
                    <th>Timings</th>
                    <th>Days</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($class = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $class['id']; ?></td>
                        <td><?php echo htmlspecialchars($class['title']); ?></td>
                        <td><?php echo htmlspecialchars($class['age_group']); ?></td>
                        <td><?php echo htmlspecialchars($class['timings']); ?></td>
                        <td><?php echo htmlspecialchars($class['days_of_week']); ?></td>
                        <td>
                            <a href="edit_class.php?id=<?php echo $class['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="view_class.php?delete=<?php echo $class['id']; ?>" 
                               onclick="return confirm('Are you sure you want to delete this class?');" 
                               class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
