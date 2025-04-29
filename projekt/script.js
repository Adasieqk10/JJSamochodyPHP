var togglePassword = document.getElementById('togglePassword');
var password = document.getElementById('password');

togglePassword.onclick = function () {
    if (password.type === 'password') {
        password.type = 'text';
        togglePassword.textContent = '🙈';
    } else {
        password.type = 'password';
        togglePassword.textContent = '👁️';
    }
};
