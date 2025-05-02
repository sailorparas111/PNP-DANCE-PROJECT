document.addEventListener('DOMContentLoaded', function () {
    const openLoginBtn = document.getElementById('openLoginBtn');
    const openRegisterBtn = document.getElementById('openRegisterBtn');
    const closeLoginModalBtn = document.getElementById('closeLoginModalBtn');
    const closeRegisterModalBtn = document.getElementById('closeRegisterModalBtn');
    const loginModal = document.getElementById('loginModal');
    const registerModal = document.getElementById('registerModal');

    if (openLoginBtn) {
        openLoginBtn.addEventListener('click', function () {
            loginModal.style.display = 'block';
        });
    }

    if (closeLoginModalBtn) {
        closeLoginModalBtn.addEventListener('click', function () {
            loginModal.style.display = 'none';
        });
    }

    if (openRegisterBtn) {
        openRegisterBtn.addEventListener('click', function () {
            registerModal.style.display = 'block';
        });
    }

    if (closeRegisterModalBtn) {
        closeRegisterModalBtn.addEventListener('click', function () {
            registerModal.style.display = 'none';
        });
    }

    // Close modal when clicking outside
    window.addEventListener('click', function (event) {
        if (event.target === loginModal) {
            loginModal.style.display = 'none';
        }
        if (event.target === registerModal) {
            registerModal.style.display = 'none';
        }
    });
});
