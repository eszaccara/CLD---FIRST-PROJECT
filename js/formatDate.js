var validateDate = false;

const formatDate = {
    date(value) {
        return value
            .replace(/\D/g, '') // Remove caracteres não numéricos
            .slice(0, 8) // Limita o número de caracteres a 8
            .replace(/(\d{2})(\d{0,2})(\d{0,4})/, function(match, day, month, year) {
                let result = day;
                if (month) {
                    result += "/" + month;
                }
                if (year) {
                    result += "/" + year;
                }
                return result;
            }); // Aplica o formato de data de nascimento
    }
};

const inputDate = document.getElementById('date');
const inputDateError = document.getElementById('error-date')
inputDate.addEventListener('input', (e)=> {
    e.target.value = formatDate.date(e.target.value);
    if (inputDate.value.length <= 9) {
        inputDateError.classList.add('input-error-active');
        inputDateError.innerHTML = "invalid date of birth.";
    } else {
        inputDateError.classList.remove('input-error-active');
        inputDateError.innerHTML = "";
        var validateDate = true;
        window.validateDate = validateDate;
    }
}, false);

inputDate.addEventListener('blur', ()=> {
    inputDateError.classList.remove('input-error-active');
    inputDateError.innerHTML = "";
})
inputDate.addEventListener('focus', ()=> {
    if (inputDate.value.length <= 9) {
        inputDateError.classList.add('input-error-active');
        inputDateError.innerHTML = "invalid date of birth.";
    }
    if (inputDate.value.length == 0) {
        inputDateError.classList.remove('input-error-active');
        inputDateError.innerHTML = "";
    }
})
