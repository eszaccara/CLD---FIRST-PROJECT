
window.addEventListener('DOMContentLoaded', () => {
    let logo = document.querySelector('.logo');
    setTimeout(() => {
        logo.classList.add('logo-active');
    }, 100);
});

const optionChange = document.getElementById('menu');
optionChange.addEventListener('change', function() {
    const optionSelect = optionChange.value
    const containerLogin = document.querySelector('.container-login');
    const containerRegister = document.querySelector('.container-register');

    if(optionSelect === "login") {
        containerLogin.classList.add('container-login-active');
        containerRegister.classList.add('container-register-active');
    } else {
        containerLogin.classList.remove('container-login-active')
        containerRegister.classList.remove('container-register-active');
    }
});




