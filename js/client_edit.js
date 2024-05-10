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







    function edit() {
        const form = document.querySelector('#editForm'); // 最初に見つかったform要素を取得する
    
 
        const formData = new FormData(form);
        const params = new URLSearchParams(this.window.location.search);

        let id = params.get('id');

        const jsonData = {"id":id
        ,  "method" : 'edit'};

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
        .then(data => console.log((data)))

        alert("更新しました。");

        window.location.href = "list.php";

    }
