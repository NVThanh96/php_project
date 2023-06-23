const passwordInput = document.getElementById('password-input');
const togglePassword = document.getElementById('toggle-password');

togglePassword.addEventListener('click', function (event) {
    event.preventDefault();
    const isVisible = passwordInput.type === 'text';
    passwordInput.type = isVisible ? 'password' : 'text';
    togglePassword.querySelector('[hidden]').removeAttribute('hidden');
    togglePassword.querySelector(':not([hidden])').setAttribute('hidden', '');
});
