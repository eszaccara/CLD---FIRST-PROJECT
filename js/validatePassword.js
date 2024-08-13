var validatePassword = false;

const passwordRegexSpecial = /[!@#$%^&*(),.?":{}|<>]/;
const passwordRegexCapital = /[A-Z]/;
const passwordRegexLower = /[a-z]/;
const passwordRegexNumber = /\d/;

const inputPassword = document.getElementById('password');
const inputPasswordError = document.getElementById('error-password');

const errorPassNumber = document.getElementById('error-passnumber');
const errorPassLower = document.getElementById('error-passlower');
const errorPassSpecial = document.getElementById('error-passspecial');
const errorPassCapital = document.getElementById('error-passcapital');
const errorPassMinLength = document.getElementById('error-passminlength');

const godPassword = document.getElementById('godPassword');

var PassR1 = false;
var PassR2 = false;
var PassR3 = false;
var PassR4 = false;
var PassR5 = false;

inputPassword.addEventListener('input', () => {
    const password = inputPassword.value;

    if (!passwordRegexCapital.test(password)) {
        errorPassCapital.classList.add('input-error-password-active');
        var PassR1 = false;
    } else {
        errorPassCapital.classList.remove('input-error-password-active');
        var PassR1 = true;
    }
    if (!passwordRegexSpecial.test(password)) {
        errorPassSpecial.classList.add('input-error-password-active');
        var PassR2 = false;
    } else {
        errorPassSpecial.classList.remove('input-error-password-active');
        var PassR2 = true;
    }
    if (!passwordRegexLower.test(password)) {
        errorPassLower.classList.add('input-error-password-active');
        var PassR3 = false;
    } else {
        errorPassLower.classList.remove('input-error-password-active');
        var PassR3 = true;
    }
    if (!passwordRegexNumber.test(password)) {
        errorPassNumber.classList.add('input-error-password-active');
        var PassR4 = false;
    } else {
        errorPassNumber.classList.remove('input-error-password-active');
        var PassR4 = true;
    }
    if (password.length < 8) {
        errorPassMinLength.classList.add('input-error-password-active');
        var PassR5 = false;
    } else {
        errorPassMinLength.classList.remove('input-error-password-active');
        var PassR5 = true;
    }

    if (PassR1 && PassR2 && PassR3 && PassR4 && PassR5) {
        validatePassword = true;
        window.validatePassword = validatePassword;
    } else {
        validatePassword = false;
    }

});


inputPassword.addEventListener('focus', () => {
    if (inputPassword.value.length === 0) {
        errorPassCapital.classList.add('input-error-password-active');
        errorPassLower.classList.add('input-error-password-active');
        errorPassSpecial.classList.add('input-error-password-active');
        errorPassNumber.classList.add('input-error-password-active');
        errorPassMinLength.classList.add('input-error-password-active');
    }
})
inputPassword.addEventListener('blur', () => {
    if (inputPassword.value.length === 0) {
        errorPassCapital.classList.remove('input-error-password-active');
        errorPassLower.classList.remove('input-error-password-active');
        errorPassSpecial.classList.remove('input-error-password-active');
        errorPassNumber.classList.remove('input-error-password-active');
        errorPassMinLength.classList.remove('input-error-password-active');
    }
})