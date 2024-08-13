var validateNameSurname = false

var lettersOnlyN = /^[A-Za-z]+$/;
var lettersOnlyS = /^[A-Za-z\s]+$/;

var nameInput = document.getElementById('name');
var surnameInput = document.getElementById('surname');

nameInput.addEventListener('focus', function() {
    addInputValidation(nameInput, 'error-name', lettersOnlyN, 'Invalid name.', 'Numbers and special characters are not allowed.', 'Fill in your name.');
});
surnameInput.addEventListener('focus', function() {
    addInputValidation(surnameInput, 'error-surname', lettersOnlyS, 'Invalid name.', 'Numbers and special characters are not allowed.', 'Fill in your name.');
});
nameInput.addEventListener('blur', function() {
    removeInputValidation(nameInput, 'error-name');
});
surnameInput.addEventListener('blur', function() {
    removeInputValidation(surnameInput, 'error-surname');
});
function addInputValidation(input, errorId, regex, invalidMessage, invalidCharactersMessage, emptyMessage) {
    input.addEventListener('input', function() {
        validateInput(input, errorId, regex, invalidMessage, invalidCharactersMessage, emptyMessage);
    });
}

function removeInputValidation(input, errorId) {
    var inputError = document.getElementById(errorId);
    clearErrorMessage(inputError);
}
function validateInput(input, errorId, regex, invalidMessage, invalidCharactersMessage, emptyMessage) {
    var inputValue = input.value.trim();
    var inputError = document.getElementById(errorId);

    if (inputValue.length <= 2) {
        showErrorMessage(inputError, invalidMessage);
    } else if (!inputValue.match(regex)) {
        showErrorMessage(inputError, invalidCharactersMessage);
    } else if (inputValue === "") {
        showErrorMessage(inputError, emptyMessage);
    } else {
        clearErrorMessage(inputError);
        var validateNameSurname = true;
        window.validateNameSurname = validateNameSurname;
    }
}
function showErrorMessage(element, message) {
    element.classList.remove('input-error');
    element.classList.add('input-error-active');
    element.innerHTML = message;
}
function clearErrorMessage(element) {
    element.classList.remove('input-error');
    element.innerHTML = '';
}