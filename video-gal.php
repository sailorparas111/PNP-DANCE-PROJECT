<?php
// Include the database connection file
require_once 'admin/connect.php';

// Fetch videos from the database
$sql = "SELECT id, title, path, type FROM videos"; // fixed column names
$result = $conn->query($sql);

// Check for SQL errors
if (!$result) {
    die("Error fetching videos: " . $conn->error);
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PNP Dance Studio</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Rajdhani&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Swiper Slider CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/css/swiper.min.css">

    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/st-index.css">
    <link rel="stylesheet" href="css/st-slider.css">

    <!-- Video Gallery CSS -->
    <link rel="stylesheet" href="css/video-gallery.css">
</head>
<body>

<?php include("nav.php"); ?>
<?php include("model.php"); ?>

<main>
    <div class="container">
    <h1 class="text-center">Video Gallery</h1>
        <div class="video-gallery">
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="video-item">
                        
                        <?php if ($row['type'] === 'upload'): ?>
                            <video controls>
                                <source src="<?php echo htmlspecialchars($row['path']); ?>" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        <?php elseif ($row['type'] === 'youtube'): ?>
                            <?php
                            // Extract YouTube video ID
                            preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $row['path'], $matches);
                            $youtube_id = $matches[1] ?? '';
                            ?>
                            <?php if (!empty($youtube_id)): ?>
                                <iframe src="https://www.youtube.com/embed/<?php echo htmlspecialchars($youtube_id); ?>" frameborder="0" allowfullscreen></iframe>
                                    <p class="vid_title"><?php echo htmlspecialchars($row['title']); ?></p>
                            <?php else: ?>
                                <p>Invalid YouTube link.</p>
                            <?php endif; ?>
                        <?php endif; ?>

                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>No videos found.</p>
            <?php endif; ?>
        </div>
    </div>
</main>

<?php include("footer.php"); ?>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/js/swiper.min.js"></script>
<!-- Your Custom JS -->
<script src="js/js-navbar.js"></script>
<script src="js/modelbox.js"></script> <!--important for modal opening -->
<script src="js/modelhandle.js"></script> <!-- important for form submit -->
<script src="js/js-slider.js"></script>

</body>

</html>

<?php
$conn->close();
?>
