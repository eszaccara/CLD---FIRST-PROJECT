editEmail = document.getElementById('editEmail');
editNumber = document.getElementById('editNumber');
editPassword = document.getElementById('editPassword');

formEmail = document.querySelector('.form-email');
formNumber = document.querySelector('.form-number');
formPassword = document.querySelector('.form-password')

configClose = document.querySelector('.config-close');
configClose2 = document.querySelector('.config-close2');
configClose3 = document.querySelector('.config-close3');



editPassword.addEventListener('click', () => {
    formPassword.classList.add('form-password-active');
    setTimeout(() => {
        formPassword.classList.add('form-password-active2');
    }, 1);
});
configClose3.addEventListener('click', () => {
    formPassword.classList.remove('form-password-active');
    formPassword.classList.remove('form-password-active2');
});



editEmail.addEventListener('click', () => {
    formEmail.classList.add('form-email-active');
    setTimeout(() => {
        formEmail.classList.add('form-email-active2');
    }, 1);
});
configClose.addEventListener('click', () => {
    formEmail.classList.remove('form-email-active');
    formEmail.classList.remove('form-email-active2');
});



editNumber.addEventListener('click', () => {
    formNumber.classList.add('form-number-active');
    setTimeout(() => {
        formNumber.classList.add('form-number-active2');
    }, 1);
});
configClose2.addEventListener('click', () => {
    formNumber.classList.remove('form-number-active');
    formNumber.classList.remove('form-number-active2');
});
const telefoneInput = document.querySelector('.input-number');
telefoneInput.addEventListener('input', function () {
    let numero = telefoneInput.value.replace(/\D/g, '');
    numero = numero.replace(/^(\d{2})(\d)/g, '($1) $2');
    numero = numero.replace(/(\d)(\d{4})$/, '$1-$2');
    telefoneInput.value = numero;
  });