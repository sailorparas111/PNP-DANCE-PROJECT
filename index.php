<?php
session_start(); // make sure session is started here or in index.php
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
    <link rel="stylesheet" href="css/slider.css">
</head>

<body>

    <?php include("nav.php"); ?>
    <?php include("model.php"); ?>

    <main>
        <?php include("slider.php"); ?>

        <!-- Image Section -->
        <section class="image-section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <img src="images/page3_img12.jpg" alt="Dance Class" class="img-fluid">
                    </div>
                    <div class="col-md-8">
                        <div class="content">
                            <h3>Express Yourself Through Dance</h3>
                            <hr>
                            <p>
                                Join our dance classes and discover the joy of movement. Our experienced instructors
                                will guide you through various dance styles, helping you build confidence and express
                                your creativity.
                            </p>
                            <a href="#" class="btn btn-primary">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Dance Styles -->
        <section class="dance-style">
            <div class="container">
                <div class="row text-center justify-content-center">
                    <div class="col-md-3 image-column">
                        <img src="images/gl01.jpg" alt="Bharatnatyam" class="img-fluid">
                        <h4>BHARATNATYAM</h4>
                    </div>
                    <div class="col-md-3 image-column">
                        <img src="images/gl02.jpg" alt="Bollywood" class="img-fluid">
                        <h4>BOLLYWOOD</h4>
                    </div>
                    <div class="col-md-3 image-column">
                        <img src="images/gl03.jpg" alt="Hip-Hop" class="img-fluid">
                        <h4>HIP-HOP</h4>
                    </div>
                    <div class="col-md-3 image-column">
                        <img src="images/gl04.jpg" alt="Contemporary" class="img-fluid">
                        <h4>CONTEMPORARY</h4>
                    </div>
                </div>
            </div>
        </section>

        <!-- Program Highlights -->
        <section class="program">
            <div class="container">
                <div class="row text-center justify-content-center">
                    <div class="col-md-4">
                        <i class="fa fa-user fa-2x"></i>
                        <h4>Personal Training</h4>
                        <hr>
                        <p>One-on-one dance sessions tailored to your goals and style.</p>
                        <a href="#" class="btn btn-primary">Learn More</a>
                    </div>
                    <div class="col-md-4">
                        <i class="fa fa-users fa-2x"></i>
                        <h4>Group Training</h4>
                        <hr>
                        <p>Learn and grow together with our dynamic group classes.</p>
                        <a href="#" class="btn btn-primary">Learn More</a>
                    </div>
                    <div class="col-md-4">
                        <i class="fa fa-star fa-2x"></i>
                        <h4>Dance Workshops</h4>
                        <hr>
                        <p>Explore new styles and skills in our creative workshops.</p>
                        <a href="#" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="instructor">
        <div class="container">
        <div class="card-section">
        
        <div class="card-container">
            <div class="card border">
                <img src="images/page4_img1.jpg" alt="Paras Sailor">
                <div class="card-content">
                    <h2>PARAS SAILOR</h2>
                    <p>OWNER - CHOREOGRAPHER - DANCE</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-container">
            <div class="card border">
                <img src="images/page4_img2.jpg" alt="Parth Patel">
                <div class="card-content">
                    <h2>PARTH PATEL</h2>
                    <p>DANCER - CHOREOGRAPHER</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-container">
            <div class="card border">
                <img src="images/page4_img3.jpg" alt="Jigisha Patel">
                <div class="card-content">
                    <h2>JIGISHA PATEL</h2>
                    <p>DANCER - CHOREOGRAPHER</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-container">
            <div class="card border">
                <img src="images/page4_img3.jpg" alt="Jigisha Patel">
                <div class="card-content">
                    <h2>JIGISHA PATEL</h2>
                    <p>DANCER - CHOREOGRAPHER</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-container">
            <div class="card border">
                <img src="images/page4_img3.jpg" alt="Jigisha Patel">
                <div class="card-content">
                    <h2>JIGISHA PATEL</h2>
                    <p>DANCER - CHOREOGRAPHER</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-container">
            <div class="card border">
                <img src="images/page4_img3.jpg" alt="Jigisha Patel">
                <div class="card-content">
                    <h2>JIGISHA PATEL</h2>
                    <p>DANCER - CHOREOGRAPHER</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>


        <!-- Add more card-container blocks here -->

    </div>
        </div>
        </section>


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