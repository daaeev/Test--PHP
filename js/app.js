const form_DOM = document.querySelector('#auth-form');
const api_url = 'http://localhost:3000';

form_DOM.addEventListener('submit', function (event) {
    event.preventDefault();

    const form_data = new FormData(form_DOM);
    let errors = false;

    clearFormErrors();

    // Введен ли емайл
    if (!form_data.get('email')) {
        addFormError('Email field is required');
        errors = true;
    }

    // Имеет ли емайл символ @
    if (!form_data.get('email')?.includes('@')) {
        addFormError('Email field must contain "@"');
        errors = true;
    }

    // Введен ли пароль
    if (!form_data.get('password')) {
        addFormError('Password field is required');
        errors = true;
    }

    // Введено ли подтверждение пароля
    if (!form_data.get('confirm_password')) {
        addFormError('Confirm password field is required');
        errors = true;
    }

    // Равно ли подтверждение пароля введенному паролю
    if (!(form_data.get('password') === form_data.get('confirm_password'))) {
        addFormError('Confirm password field must be equal to password field');
        errors = true;
    }

    // Если ошибок нет
    if (!errors) {
        axios.post(api_url + '/site/auth', form_data)
            .then(() => {
                document.querySelector('#auth-form').classList.add('d-none');
                document.querySelector('#auth-success').classList.remove('d-none');
            })
            .catch(error => {
                clearFormErrors();

                const errors = error.response?.data?.errors;
                
                if (typeof errors === 'object') {
                    for (const [field, errorsList] of Object.entries(errors)) {
                        errorsList.forEach(error => addFormError(error));
                    }
                }
            });
    }
})

/**
 * Добавить ошибку в поле вывода ошибок формы
 *
 * @param error
 */
function addFormError(error) {
    const li = document.createElement('li');
    li.appendChild(document.createTextNode(error));

    document.querySelector('#auth-errors').classList.remove('d-none');
    document.querySelector('#auth-errors #errors-list').appendChild(li);
}

/**
 * Очистить поле вывода ошибок формы
 */
function clearFormErrors() {
    document.querySelector('#auth-errors').classList.add('d-none');
    document.querySelector('#auth-errors #errors-list').innerHTML = '';
}
