<body id="body-pd">
        <header class="header" id="header">
            <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
            <div class="header_img"> <img src="https://i.imgur.com/hczKIze.jpg" alt=""> </div>
        </header>
        <div class="l-navbar" id="nav-bar">
            <nav class="nav">
                <div> <a href="index.php" class="nav_logo">
                        <img src="imgs/logo white.png" height="50px" alt="">
                        <span class="nav_logo-name"></span>
                    </a>
                    <div class="nav_list">
                        <a href="index.php" class="nav_link active">
                            <i class='bx bx-grid-alt nav_icon'></i>
                            <span class="nav_name">Dashboard</span> </a>
                        <a href="add_admission.php" class="nav_link">
                            <i class='bx bx-user nav_icon'></i>
                            <span class="nav_name">Admission</span> </a>
                        <a href="viewdata.php" class="nav_link">
                            <i class='bx bx-user nav_icon'></i>
                            <span class="nav_name">View Student Data</span> </a>
                        <a href="add_inquiry.php" class="nav_link">
                            <i class='bx bx-bookmark nav_icon'></i>
                            <span class="nav_name">Inquiry</span> </a>
                        <a href="view_inquiry.php" class="nav_link">
                            <i class='bx bx-folder nav_icon'></i>
                            <span class="nav_name">Inquiry Data</span> </a>
                        <a href="add_attendance.php" class="nav_link">
                            <i class='bx bx-bar-chart-alt-2 nav_icon'></i>
                            <span class="nav_name">Attandence</span> </a>
                    </div>
                </div>

                <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) { ?>
                <a href="#" class="nav_link" onclick="logout()">
                    <i class='bx bx-log-out nav_icon'></i> 
                    <span class="nav_name">Log Out</span>
                </a>
            <?php } ?>

            <form method="post" action="logout.php" id="logoutForm" style="display: none;">
                <!-- This hidden form is submitted when the link is clicked -->
                <button type="submit" name="logout" id="logoutButton"></button>
            </form>
        </nav>
    </div>
    <script>
        function logout() {
            document.getElementById('logoutButton').click();
        }
    </script>