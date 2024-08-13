var validateNumber = window.validateNumber;
var validateEmail = window.validateEmail;
var validatePassword = window.validatePassword;
var validateDate = window.validateDate;
var validateNameSurname = window.validateNameSurname;




const form = document.querySelector('.form-register');
form.addEventListener('submit', (e)=> {
    if (validateNumber && validateEmail && validatePassword && validateDate && validateNameSurname) {
        form.submit();
    } else {
        e.preventDefault();
    }
})