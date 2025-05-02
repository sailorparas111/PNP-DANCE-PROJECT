<?php
require_once 'admin/connect.php';

// Fetch classes from the database
$query = "SELECT * FROM classes ORDER BY created_at DESC";
$result = $conn->query($query);
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

</head>

<body>

    <?php include("nav.php"); ?>
    <?php include("model.php"); ?>

    <main>
        <!-- Hero Banner -->
        <section id="hero-banner" class="text-center bg-dark text-white py-5">
            <div class="container">
                <h1>Welcome to PNP Dance Studio</h1>
                <p class="lead">Discover your rhythm, unleash your talent, and dance like never before!</p>
                <a href="#classes" class="btn btn-light btn-lg mt-3">Explore Classes</a>
            </div>
        </section>

        <div class="classes">
            <div class="container my-5">
                <h1 class="text-center mb-4">Our Classes</h1>
                <div class="row g-4">
                    <?php while ($class = $result->fetch_assoc()): ?>
                        <div class="col-md-4">
                            <div class="card">
                                <img src="<?php echo htmlspecialchars($class['image'] ?? 'default-class.jpg'); ?>"
                                    class="card-img-top" alt="<?php echo htmlspecialchars($class['title']); ?>">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo htmlspecialchars($class['title']); ?></h5>
                                    <p><strong>Age Group:</strong> <?php echo htmlspecialchars($class['age_group']); ?></p>
                                    <p><strong>Timings:</strong> <?php echo htmlspecialchars($class['timings']); ?></p>
                                    <p><strong>Days:</strong> <?php echo htmlspecialchars($class['days_of_week']); ?></p>
                                    <p class="card-text">
                                        <?php echo htmlspecialchars(substr($class['description'], 0, 100)); ?>...</p>
                                    <ul>
                                        <?php
                                        $keyPoints = explode(',', $class['key_points']);
                                        foreach ($keyPoints as $point):
                                            ?>
                                            <li><?php echo htmlspecialchars($point); ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                    <a href="class_details.php?id=<?php echo $class['id']; ?>" class="btn">Learn More</a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
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
    <script src="js/modelbox.js"></script>
    <script src="js/modelhandle.js"></script>
    <script src="js/js-slider.js"></script>
</body>

</html>