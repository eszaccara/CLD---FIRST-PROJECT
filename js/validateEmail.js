var validateEmail = false;

const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

var emailInput = document.getElementById('email');
var emailInputError = document.getElementById('error-email');

emailInput.addEventListener('input', ()=> {
    if (emailRegex.test(emailInput.value)) {
        emailInputError.classList.remove('input-error-active');
        emailInputError.innerHTML = "";
        const validateEmail = true
        window.validateEmail = validateEmail;
    } else {
        emailInputError.classList.add('input-error-active');
        emailInputError.innerHTML = "Invalid email.";
    }
})
emailInput.addEventListener('blur', () => {
    emailInputError.classList.remove('input-error-active');
    emailInputError.innerHTML = "";
})
emailInput.addEventListener('focus', () => {
    if (emailRegex.test(emailInput.value)) {
        emailInputError.classList.remove('input-error-active');
        emailInputError.innerHTML = "";
}})