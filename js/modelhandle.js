document.addEventListener('DOMContentLoaded', function () {
    const loginForm = document.getElementById('loginForm');
    const registerForm = document.getElementById('registerForm');

    if (loginForm) {
        loginForm.addEventListener('submit', function (e) {
            e.preventDefault(); // Stop default form submit
            const username = document.getElementById('login_username').value;
            const password = document.getElementById('login_password').value;

            fetch('login.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: `username=${encodeURIComponent(username)}&password=${encodeURIComponent(password)}`
            })
            .then(res => res.text())
            .then(response => {
                if (response.trim() === 'success') {
                    window.location.href = 'index.php'; // Redirect after login
                } else {
                    alert('Login Failed: ' + response);
                }
            })
            .catch(error => {
                alert('Error: ' + error);
            });
        });
    }

    if (registerForm) {
        registerForm.addEventListener('submit', function (e) {
            e.preventDefault(); // Stop default form submit
            const formData = new FormData(registerForm);

            fetch('register.php', {
                method: 'POST',
                body: new URLSearchParams(formData)
            })
            .then(res => res.text())
            .then(response => {
                if (response.trim() === 'success') {
                    alert('Registration Successful!');
                    registerForm.reset();
                    document.getElementById('registerModal').style.display = 'none'; // Close Modal
                } else {
                    alert('Registration Failed: ' + response);
                }
            })
            .catch(error => {
                alert('Error: ' + error);
            });
        });
    }
});
