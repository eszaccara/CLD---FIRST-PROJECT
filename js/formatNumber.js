var validateNumber = false;

const formatNumber = {
    phone(value) {
        return value
            .replace(/\D/g, '')
            .replace(/(\d{2})(\d)/, '($1)$2')
            .replace(/(\d{4})(\d)/, '$1-$2')
            .replace(/(\d{4})-(\d)(\d{4})/, '$1$2-$3')
            .replace(/(-\d{4})\d+?$/, '$1')
        }
    };
    
    const inputNumber = document.getElementById('number');
    const inputNumberError = document.getElementById('error-number');
    const field = inputNumber.dataset.js;
    
    inputNumber.addEventListener('input', (e) => {
        e.target.value = formatNumber[field](e.target.value);
        if (inputNumber.value.length <= 12) {
            inputNumberError.classList.add('input-error-active');
            inputNumberError.innerHTML = "Invalid number. Ex.: (12)5225-4004";
        } else {
            inputNumberError.classList.remove('input-error-active');
            inputNumberError.innerHTML = "";
            var validateNumber = true;
            window.validateNumber = validateNumber;
        }
    }, false);
    inputNumber.addEventListener('blur', () => {
        inputNumberError.classList.remove('input-error-active');
        inputNumberError.innerHTML = "";
    });
inputNumber.addEventListener('focus', () => {
    if (inputNumber.value.length <= 12) {
        inputNumberError.classList.add('input-error-active');
        inputNumberError.innerHTML = "Invalid number. Ex.: (12)5225-4004";
    }
    if (inputNumber.value.length == 0) {
        inputNumberError.classList.remove('input-error-active');
        inputNumberError.innerHTML = "";    }
    })