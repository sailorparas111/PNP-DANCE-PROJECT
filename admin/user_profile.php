<?php
include("logout.php");
include("connect.php"); // Include the connection file
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style_userpro.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;400;700&family=Poppins:wght@200&display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet" />


    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Boxicons CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <link rel="stylesheet" href="css/stylesi.css">

    <title>Portfolio</title>

</head>

<body>

    <?php
    include("side_navbar.php");
    ?>
    <header>
    
    <div class="hero flex items-centre justify-between">
        <div class="left flex-1 justify-center">
            <img src="https://images.pexels.com/photos/1382731/pexels-photo-1382731.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" />
        </div>
        <div class="right flex-1">
            <h6>CODEWITHRANDOM</h6>
            <h1>
                I'm a Web<br />
                <span>Developer</span>
            </h1>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque
                illum nam nobis, minima laudantium fugit sequi nostrum quod impedit,
                beatae necessitatibus praesentium optio labore nemo!
            </p>
            <div><button class="btn btn-secondary">DOWNLOAD CV</button></div>
        </div>
    </div>
</header>

<section class="about">
    <div class="container flex items-centre">
        <div class="left flex-1 justify-right">
            <img src="https://images.pexels.com/photos/1382731/pexels-photo-1382731.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
                height="400px" alt="profile pic" />
        </div>
        <div class="right flex-1">
            <h1>About <span>Me</span></h1>
            <h3>Hello! I'm CODEWITHRANDOM.</h3>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque
                adipisci distinctio obcaecati aliquid, quia tempora quis optio
                repudiandae officia earum? Lorem ipsum dolor sit amet
                consectetur, adipisicing elit.
            </p>
            <div class="socials">
                <a href="#"><img
                        src="https://images.pexels.com/photos/1758144/pexels-photo-1758144.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
                        width="40px" /></a>
                <a href="#"><img
                        src="https://images.pexels.com/photos/1382734/pexels-photo-1382734.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
                        width="40px" /></a>
                <a href="#"><img
                        src="https://images.pexels.com/photos/1462636/pexels-photo-1462636.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
                        width="40px" /></a>
                <a href="#"><img
                        src="https://images.pexels.com/photos/1758144/pexels-photo-1758144.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
                        width="40px" /></a>
            </div>
        </div>
    </div>
</section>
<section class="services">
    <div class="container">
        <h1 class="services-head">Services</h1>
        <p>All your digital needs... covered.</p>
        <div class="card-grid">
            <div class="card">
                <img src="https://source.unsplash.com/1600x900/?nature,water" />
                <h2>Graphic Desgin</h2>
                <p>
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                    Nulla, debitis?
                </p>
            </div>
            <div class="card">
                <img src="https://source.unsplash.com/1600x900/?boy,men" />
                <h2>Web Development</h2>
                <p>
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                    Nulla, debitis?
                </p>
            </div>
            <div class="card">
                <img src="https://source.unsplash.com/1600x900/?car,bike" />
                <h2>Content Writing</h2>
                <p>
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                    Nulla, debitis?
                </p>
            </div>
        </div>
    </div>
</section>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-GLhlTQ8iKuOVpL+KGkCL5MdHEabfQxu1c+g7lsF86l/20RS6I5wG5F5iJazExg"
        crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="js/nav.js"></script>
</body>

</html>

