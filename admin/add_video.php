<?php
include 'connect.php'; // connect.php should create a $conn variable

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $videoTitle = isset($_POST['video_title']) ? $_POST['video_title'] : '';
    $videoType = isset($_POST['video_type']) ? $_POST['video_type'] : '';
    $videoPath = '';

    if ($videoType == 'upload') {
        if (isset($_FILES['video_file']) && $_FILES['video_file']['error'] == 0) {
            $targetDir = "uploads/";
            $targetFile = $targetDir . basename($_FILES['video_file']['name']);
            $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

            $allowedTypes = ['mp4', 'avi', 'mov', 'wmv'];
            if (in_array($fileType, $allowedTypes)) {
                if (move_uploaded_file($_FILES['video_file']['tmp_name'], $targetFile)) {
                    $videoPath = $targetFile;
                } else {
                    echo "Error uploading file.";
                }
            } else {
                echo "Invalid file type.";
            }
        }
    } elseif ($videoType == 'youtube') {
        $youtubeLink = isset($_POST['youtube_link']) ? $_POST['youtube_link'] : '';
        if (filter_var($youtubeLink, FILTER_VALIDATE_URL)) {
            $videoPath = $youtubeLink;
        } else {
            echo "Invalid YouTube link.";
        }
    }

    // Save video details to database
    if (!empty($videoPath)) {
        $stmt = $conn->prepare("INSERT INTO videos (title, path, type) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $videoTitle, $videoPath, $videoType);
        if ($stmt->execute()) {
            echo "Video uploaded successfully.";
        } else {
            echo "Error saving video.";
        }

        $stmt->close();
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
    include("side_navbar.php");
    ?>

    <h1>Add Video</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="video_title">Video Title:</label>
        <input type="text" name="video_title" id="video_title" required><br><br>

        <label for="video_type">Video Type:</label>
        <select name="video_type" id="video_type" required>
            <option value="upload">Upload from Device</option>
            <option value="youtube">YouTube Link</option>
        </select><br><br>

        <div id="upload_section">
            <label for="video_file">Upload Video:</label>
            <input type="file" name="video_file" id="video_file"><br><br>
        </div>

        <div id="youtube_section" style="display: none;">
            <label for="youtube_link">YouTube Link:</label>
            <input type="url" name="youtube_link" id="youtube_link"><br><br>
        </div>

        <button type="submit">Submit</button>
    </form>

    <script>
        const videoTypeSelect = document.getElementById('video_type');
        const uploadSection = document.getElementById('upload_section');
        const youtubeSection = document.getElementById('youtube_section');

        videoTypeSelect.addEventListener('change', function () {
            if (this.value === 'upload') {
                uploadSection.style.display = 'block';
                youtubeSection.style.display = 'none';
            } else if (this.value === 'youtube') {
                uploadSection.style.display = 'none';
                youtubeSection.style.display = 'block';
            }
        });
    </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-GLhlTQ8iKuOVpL+KGkCL5MdHEabfQxu1c+g7lsF86l/20RS6I5wG5F5iJazExg"
        crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="js/nav.js"></script>
</body>

</html>
