
<body id="body-pd">
<header class="header" id="header">
    <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
    <button class="header_img" onclick="toggleDropdown('profileDropdown')">
        <img src="https://i.imgur.com/hczKIze.jpg" alt="">
        <div class="dropdown-arrow">
        <i class="bx bx-chevron-down nav_dropdown-icon"></i>
        </div>
    </button>
</header>

<!-- Dropdown menu for profile -->
<div class="profile-dropdown" id="profileDropdown" style="display: none;">
<div class="profile-info">
    <p>Welcome, <?php echo $username; ?> </p>
</div>

    <div class="dropdown-items">
        <a href="user_profile.php" class="dropdown-item">Profile</a>
        <a href="settings.php" class="dropdown-item">Settings</a>
        <form method="post" action="logout.php" class="logout-form">
            <button type="submit" name="logout" class="dropdown-item">Log Out</button>
        </form>
    </div>
</div>


    
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div>
                <a href="index.php" class="nav_logo">
                    <img src="imgs/logo white.png" height="40px" alt="">
                    <span class="nav_logo-name"></span>
                </a>
                <div class="nav_list">
                    <a href="index.php" class="nav_link active">
                        <i class='bx bx-grid-alt nav_icon'></i>
                        <span class="nav_name">Dashboard</span>
                    </a>
                    <div class="nav_dropdown">
                        <a href="#" class="nav_link" onclick="toggleDropdown('dropdownContent1')">
                            <i class='bx bx-user nav_icon'></i>
                            <span class="nav_name">Admission</span>
                            <i class='bx bx-chevron-down nav_dropdown-icon'></i>
                        </a>
                        <div class="nav_dropdown-content" id="dropdownContent1">
                            <a href="add_admission.php">Add Admission</a>
                            <a href="viewdata.php">View Student Data</a>
                            <a href="view_receipt_data.php">View Receipt Data</a>
                        </div>
                    </div>
                    <div class="nav_dropdown">
                        <a href="#" class="nav_link" onclick="toggleDropdown('dropdownContent2')">
                            <i class='bx bx-bookmark nav_icon'></i>
                            <span class="nav_name">Inquiry</span>
                            <i class='bx bx-chevron-down nav_dropdown-icon'></i>
                        </a>
                        <div class="nav_dropdown-content" id="dropdownContent2">
                            <a href="add_inquiry.php">Add Inquiry</a>
                            <a href="view_inquiry.php">View Inquiry</a>
                        </div>
                    </div>
                    <div class="nav_dropdown">
                        <a href="#" class="nav_link" onclick="toggleDropdown('dropdownContent3')">
                            <i class='bx bx-bar-chart-alt-2 nav_icon'></i>
                            <span class="nav_name">Attendance</span>
                            <i class='bx bx-chevron-down nav_dropdown-icon'></i>
                        </a>
                        <div class="nav_dropdown-content" id="dropdownContent3">
                            <a href="add_attendance.php">Add Attendance</a>
                            <a href="view_attendance.php">View Attendance</a>
                        </div>
                    </div>
                    <div class="nav_dropdown">
                        <a href="#" class="nav_link" onclick="toggleDropdown('dropdownContent5')">
                            <i class='bx bx-bar-chart-alt-2 nav_icon'></i>
                            <span class="nav_name">Classes</span>
                            <i class='bx bx-chevron-down nav_dropdown-icon'></i>
                        </a>
                        <div class="nav_dropdown-content" id="dropdownContent5">
                            <a href="add_class.php">Add Classes</a>
                            <a href="view_class.php">View classes</a>
                        </div>
                    </div>
                    <div class="nav_dropdown">
                        <a href="#" class="nav_link" onclick="toggleDropdown('dropdownContent4')">
                            <i class='bx bx-movie-play nav_icon'></i>
                            <span class="nav_name">Video</span>
                            <i class='bx bx-chevron-down nav_dropdown-icon'></i>
                        </a>
                        <div class="nav_dropdown-content" id="dropdownContent4">
                            <a href="add_video.php">Add Video</a>
                            <a href="video_upload.php">View Video</a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Boxicons Library -->
    <script src="https://unpkg.com/boxicons"></script>

    <script>
        // Function to toggle dropdown submenu
        function toggleDropdown(elementId) {
            var dropdownContent = document.getElementById(elementId);
            if (dropdownContent.style.display === "block") {
                dropdownContent.style.display = "none";
            } else {
                dropdownContent.style.display = "block";
            }
        }
    </script>
</body>