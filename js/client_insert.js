document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('#Signupform'); 
    const inputElms = form.querySelectorAll('input, select');

    form.addEventListener('submit', function(e) {
        e.preventDefault();

        // Clear previous error messages
        inputElms.forEach((input) => {
            const label = input.closest('label');
            if (label) {
                label.classList.remove('is-error');
                const errorMessage = label.nextElementSibling;
                if (errorMessage && errorMessage.classList.contains('error-message')) {
                    errorMessage.textContent = '';
                }
            }
        });

        // Check for validation
        let isValid = true;
        inputElms.forEach((input) => {
            if (!input.checkValidity()) {
                isValid = false;
                const label = input.closest('label');
                if (label) {
                    label.classList.add('is-error');
                    const errorMessage = label.nextElementSibling;
                    if (errorMessage && errorMessage.classList.contains('error-message')) {
                        if (input.tagName.toLowerCase() === 'select') {
                            errorMessage.textContent = 'このフィールドは選択してください';
                        } else if (input.validity.patternMismatch) {
                            input.setCustomValidity(input.title);
                            errorMessage.textContent = input.validationMessage;
                            input.setCustomValidity('');
                        } else {
                            errorMessage.textContent = input.validationMessage;
                        }
                    }
                }
            }
        });

        if (isValid) {
            const formData = new FormData(form);
            const jsonData = {};

            formData.forEach((value, key) => {
                jsonData[key] = value;
            });

            jsonData["method"] = 'insert';

            fetch('api/controller.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(jsonData)
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                alert("データを登録しました。");
                window.location.href = "list.php";
            })
            .catch(error => console.error('Error:', error));
        }
    });

    inputElms.forEach((input) => {
        input.addEventListener('input', () => {
            const label = input.closest('label');
            if (label && input.checkValidity()) {
                label.classList.remove('is-error');
                const errorMessage = label.nextElementSibling;
                if (errorMessage && errorMessage.classList.contains('error-message')) {
                    errorMessage.textContent = '';
                }
            }
        });

        input.addEventListener('invalid', (e) => {
            e.preventDefault();
            const label = input.closest('label');
            if (label) {
                label.classList.add('is-error');
                const errorMessage = label.nextElementSibling;
                if (errorMessage && errorMessage.classList.contains('error-message')) {
                    if (input.tagName.toLowerCase() === 'select') {
                        errorMessage.textContent = 'この項目は選択必須です';
                    } else if (input.validity.patternMismatch) {
                        input.setCustomValidity(input.title);
                        errorMessage.textContent = input.validationMessage;
                        input.setCustomValidity('');
                    } else {
                        errorMessage.textContent = input.validationMessage;
                    }
                }
            }
        });
    });
});