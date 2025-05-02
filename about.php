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


    <style>
        body {
        color: #fff;
        }

        .about-section {
            padding: 80px 0;
        }

        .about-img {
            max-width: 100%;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .about-content h2 {
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 30px;
            color: #fff;
        }

        .about-content p {
            font-size: 18px;
            margin-bottom: 20px;
            line-height: 1.7;
        }

        .highlight {
            color: #007bff;
            font-weight: bold;
        }

        .values-section {
            padding: 40px 5px;
        }

        .value-box {
        text-align: center;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }

        .value-box i {
            font-size: 40px;
            color: #007bff;
            margin-bottom: 15px;
        }

        .value-box h5 {
            font-weight: 700;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

    <?php include("nav.php"); ?>
    <?php include("model.php"); ?>

    <!-- About Section -->
    <section class="about-section container">
        <div class="row align-items-center">
            <div class="col-md-6 mb-4 mb-md-0">
                <img src="images/1414.jpg" alt="About Dance" class="about-img">
            </div>
            <div class="col-md-6 about-content">
                <h2 class="display-5 fw-bold">About PNP Dance Studio</h2>
                <p>
                    PNP Dance Studio is not just a dance institute — it’s a vibrant, inclusive space where rhythm, expression, and creativity come alive. Founded by passionate dancer and choreographer <strong>Paras Sailor</strong>, the studio was born from a dream to create a platform where people from all walks of life could experience the transformative power of dance.
                </p>
                <p>
                    From humble beginnings, PNP Dance Studio has grown into a buzzing hub for dancers of all skill levels — kids taking their first steps in rhythm, adults rediscovering their passion, and performers polishing their craft. Our core belief is that <strong>dance is for everyone</strong>, regardless of age or experience. It's a powerful form of self-expression, an outlet for energy, and a path to emotional and physical well-being.
                </p>
                <p>
                    We offer an exciting variety of dance styles such as <strong>Garba, Bollywood, Hip-Hop, Contemporary, Bharatanatyam</strong>, and more. Every class is taught by expert instructors who bring energy, discipline, and personal attention to each student.
                </p>
                <p>
                    What truly sets PNP Dance Studio apart is our <strong>community spirit</strong>. We believe in learning together, growing together, and celebrating every small win. Our studio is a space where confidence is built, friendships are formed, and passion is nurtured. We regularly host <strong>workshops, events, and performances</strong> to showcase talent and create unforgettable experiences.
                </p>
                <p>
                    At PNP Dance Studio, dance is more than movement — it's a way of life. Join our growing family and experience the magic of movement with us. Whether you're dancing to express, to heal, to connect, or simply to smile — your journey starts here.
                </p>
            </div>
        </div>
    </section>

    <!-- Values Section -->
    <section class="values-section">
        <div class="container text-center">
            <h2 class="mb-5 fw-bold">Our Core Values</h2>
            <div class="row">
                <div class="col-md-4 value-box">
                    <i class="fas fa-heart"></i>
                    <h5>Passion</h5>
                    <p>We dance from the heart and ignite creativity in everyone.</p>
                </div>
                <div class="col-md-4 value-box">
                    <i class="fas fa-users"></i>
                    <h5>Community</h5>
                    <p>We build strong bonds through group sessions, events, and workshops.</p>
                </div>
                <div class="col-md-4 value-box">
                    <i class="fas fa-star"></i>
                    <h5>Excellence</h5>
                    <p>Our instructors are dedicated to helping you grow and shine.</p>
                </div>
            </div>
        </div>
    </section>

    <?php include('footer.php'); ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
