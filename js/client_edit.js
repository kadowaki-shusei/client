window.addEventListener("load", function() {

    const params = new URLSearchParams(this.window.location.search);
   
    let id = params.get('id');

    const jsonData = {"data":{
        "id":id
    },
    "method" : 'detail'};
 
    // fetchを使ってAPIエンドポイントにPOSTリクエストを送信
    fetch('api/controller.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(jsonData)
    })
    .then(response => response.json()) // レスポンスをJSON形式に変換
    .then(data => {
        if (data.error) {
            console.error('Error:', data.error);
        } else {
// 取得したデータをテキストボックスに表示する処理をここに記述するボックス
            document.getElementById('name').value = data. body[0].name ;
            document.getElementById('kana').value = data. body[0].kana;
            document.getElementById('mail').value = data. body[0].mail;
            document.getElementById('tel').value = data. body[0].tel;
            document.getElementById('gender').value = data. body[0].gender;
            document.getElementById('birthday').value = data. body[0].birthday;
            document.getElementById('company_id').value = data. body[0].company_id;
        }
    })
    .catch(error => console.error('Error:', error));


})





document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('#editForm'); 
    const inputElms = form.querySelectorAll('input, select');

    form.addEventListener('submit', function(event) {
        event.preventDefault();

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
            const params = new URLSearchParams(window.location.search);
            let id = params.get('id');

            const jsonData = { "id": id, "method": 'edit' };

            formData.forEach((value, key) => {
                jsonData[key] = value;
            });

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
                alert("更新しました。");
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
