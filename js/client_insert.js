document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('#Signupform'); // 最初に見つかったform要素を取得する
    form.addEventListener('submit', function(event) {
        event.preventDefault();
        const formData = new FormData(form);
        const jsonData = {};

        formData.forEach((value, key) => {
            jsonData[key] = value;
        });

        jsonData["method"] = 'insert'


        fetch('api/controller.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(jsonData)
        })
        
        .then(response => response.json())
        .then(data => console.log((data)))
        alert("データを登録しました。");

        window.location.href = "list.php";
        


    }
);
        
});