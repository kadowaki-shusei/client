window.addEventListener("load", function() {
    // ページが完全に読み込まれた時の処理をここに記述する
    const jsonData = {};
    jsonData["method"] = 'list';

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
            // 取得したデータをビューに表示する処理をここに記述する
            renderData(data.body); // データをビューに表示する関数を呼び出す
        }
    })
    .catch(error => console.error('Error:', error));



    const last_birthday = new Date();
    function dateFormat(date, format){
        format = format.replace("YYYY", date.getFullYear());
        format = format.replace("MM", ("0"+(date.getMonth() + 1)).slice(-2));
        format = format.replace("DD", ("0"+ date.getDate()).slice(-2));
        return format;
    }
    const data = dateFormat(last_birthday, 'YYYY-MM-DD');
    const field = document.getElementById("last_birthday");
    if (field) { 
        field.value = data;
        // field.setAttribute("min", data);
    } else {
        console.error("Element with id 'last_birthday' not found."); 
    }
    
});

document.getElementById('search').addEventListener('click', function() {
    const form = document.querySelector('#searchform'); 
    const table = document.getElementById("UserList");
    table.innerHTML = '';
    

        const formData = new FormData(form);
        const jsonData = {};

        formData.forEach((value, key) => {
            jsonData[key] = value;
        });

        jsonData["method"] = 'search'


        console.log(jsonData);

        fetch('api/controller.php', {
            method: 'POST',
      
            body: JSON.stringify(jsonData)
        })
        .then(response => response.json())
        .then(data => {

            console.log(data);
            if (data.error) {
                console.error('Error:', data.error);
            } else {
                // 取得したデータをビューに表示する処理をここに記述する
                renderData(data.body); // データをビューに表示する関数を呼び出す
            }
        })
    
});

document.getElementById('cancel').addEventListener('click', function() {
    const jsonData = {};
    jsonData["method"] = 'list';

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
            // 取得したデータをビューに表示する処理をここに記述する
            renderData(data.body); // データをビューに表示する関数を呼び出す
        }
    })
    .catch(error => console.error('Error:', error));
});




// データをビューに表示する関数
function renderData(data) {
    const table = document.getElementById("UserList");
    let tableHTML = '';
    // テーブルのHTML文字列を初期化する
    data.forEach(item => {
        tableHTML += '<tr>';
        tableHTML += '<td>' + item['id'] + '</td>'; 
        tableHTML += '<td>' + item['name']+ '(' + item['kana'] + ')' +'</td>'; 
        tableHTML += '<td nowrap>' + item['mail'] + '</td>'; 
        tableHTML += '<td>' + item['tel'] + '</td>'; 
        tableHTML += '<td nawrap>' + item['company_name'] + '</td>';
        tableHTML += '<td nowrap>' + item['signup_date']+ '(' + item['last_update'] + ')' +'</td>'; 
        tableHTML += '<td><button id="edit" class="updateButton">編集</button></td>';
        tableHTML += '<td><button class="deleteButton">削除</button></td>';
        tableHTML += '</tr>';
    });
    // テーブルにHTML文字列をセットする
    table.innerHTML = tableHTML;

    // 編集ボタンのクリックイベントを設定する
    document.querySelectorAll('.updateButton').forEach((button, index) => {
        button.addEventListener('click', function() {
            location.href = 'update.php?id=' + data[index]['id']; // 顧客IDをGETパラメータとして渡す
        });
    });

    // 削除ボタンのクリックイベントを設定する
    document.querySelectorAll('.deleteButton').forEach((button, index) => {
        button.addEventListener('click', function() {
            const id = data[index]['id'];

            if(confirm("削除しますか？")) {

                const jsonData = {"id":id
                , "method" : 'delete'};

            fetch('api/controller.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(jsonData)
            })
            .then(response => response.json())
            .then(data => {
                // 削除が成功した場合の処理を行う
                if (data.success === 0) {
                    
                } else {
                    console.error('Error:', data.error);
                }
            })
            .catch(error => console.error('Error:', error));


            }
                location.reload();

            // ここで削除ボタンがクリックされた行の顧客IDを使って削除処理を行う必要があります
        });
    });
}