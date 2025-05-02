

<header>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top initial-dark">
        <div class="container">

            <!-- Logo -->
            <a class="navbar-brand" href="index.php">
                <img src="images/logo white.png" alt="Dance Studio Logo" height="40">
            </a>

            <!-- Mobile Toggle -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Content -->
            <div class="collapse navbar-collapse" id="navbarNav">

                <!-- Centered Navbar Links -->
                <ul class="navbar-nav mx-auto text-center">
                    <li class="nav-item">
                        <a class="nav-link dark-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link dark-link" href="classes.php">Classes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link dark-link" href="video-gal.php">Video Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link dark-link" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link dark-link" href="contact.php">Contact</a>
                    </li>
                </ul>

                <!-- Right Side (Login/Register/Profile) -->
                <div class="d-flex align-items-center">

                    <?php if (isset($_SESSION['user_id'])) { ?>
                        <!-- Profile Dropdown -->
                        <div class="dropdown">
                            <button class="btn btn-light rounded-pill dropdown-toggle d-flex align-items-center" type="button" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user-circle fa-2x"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                                <li><a class="dropdown-item" href="profile.php">View Profile</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                            </ul>
                        </div>
                    <?php } else { ?>
                        <!-- Login/Register -->
                        <button id="openLoginBtn" class="btn btn-light mx-2 rounded-pill">Login</button>
                        <button id="openRegisterBtn" class="btn btn-dark rounded-pill">Register</button>
                    <?php } ?>

                </div>

            </div>

        </div>
    </nav>
</header>
