<!-- Login Modal -->
<div id="loginModal" class="modal">
    <div class="modal-content">
        <span class="close" id="closeLoginModalBtn">&times;</span>
        <h2>Login</h2>
        <form id="loginForm">
            <label for="login_username">Username:</label>
            <input type="text" id="login_username" name="username" required>

            <label for="login_password">Password:</label>
            <input type="password" id="login_password" name="password" required>

            <button type="submit">Login</button>
            <a href="forgetpass.php">Forgotten password?</a>
        </form>
    </div>
</div>

<!-- Register Modal -->
<div id="registerModal" class="modal">
    <div class="modal-content">
        <span class="close" id="closeRegisterModalBtn">&times;</span>
        <h2>Register</h2>
        <form id="registerForm">
            <label for="fname">First Name:</label>
            <input type="text" id="fname" name="fname" required>

            <label for="lname">Last Name:</label>
            <input type="text" id="lname" name="lname" required>

            <label for="register_username">Username or Email:</label>
            <input type="text" id="register_username" name="username" required>

            <label for="register_password">Password:</label>
            <input type="password" id="register_password" name="password" required>

            <label for="register_cnf_password">Confirm Password:</label>
            <input type="password" id="register_cnf_password" name="cnf_password" required>

            <label for="register_bdate">Date of Birth:</label>
            <input type="date" id="register_bdate" name="dob" required>

            <button type="submit">Register</button>
        </form>
    </div>
</div>
