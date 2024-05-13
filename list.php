<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>顧客管理システム</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header class="header">
        <h1>顧客管理システム</h1>
        <a href="index.php" class="top-link link1">TOPに戻る</a>
    </header>
    <main>
        <div class="content-wrap">
            <div class="search-box">
                <form method="POST" id="searchform">
                    <div>
                        <label>顧客名　　　　　<input maxlength="32" name="name"></label>
                    </div>

                    <div>
                        <label>顧客名（カナ）　<input maxlength="32"  name="kana"></label>
                    </div>

                    <div>
                        <label>性別　　　　　　<select name="gender">
                            <option value="all">全て</option>
                            <option value="1">1.男</option>
                            <option value="2">2.女</option>
                            <option value="3">3.どちらでもない</option>
                            </select>
                        </label>
                    </div>

                    <div class="date">
                        <label>生年月日　　　　<input name="first_birthday" id="first_birthday" type="date"></label>                    
                        <label>~<input name="last_birthday" id="last_birthday" type="date"></label>
                    </div>

                    <div>
                        <label>所属会社　　　　<select name="company_id">
                            <option value="all">全て</option>
                            <option value="1">1.A株式会社</option>
                            <option value="2">2.B株式会社</option>
                            <option value="3">3.C株式会社</option>
                            </select>
                        </label>
                    </div>
                    <button class="same-btn cancel-btn"type="reset" id="cancel" >キャンセル</button>
                    <button  class="same-btn client-search-btn" type="button" id="search">検索</button>
                </form>
            </div>
                <button onclick="location.href='signup.php'" class="same-btn client-signup-btn">登録</button>
        </div>
        <h2 class="list-title">顧客一覧</h2>
        <hr class="style0">
        <table class="client_list">
            <thead>
                <tr>
                    <th nowrap>顧客ID</th>
                    <th nowrap>顧客名（カナ）</th>
                    <th nowrap>メールアドレス</th>
                    <th nowrap>電話番号</th>
                    <th nowrap>所属会社</th>
                    <th nowrap>新規登録日時（最終更新日時）</th>
                    <th nowrap>編集ボタン</th>
                    <th nowrap>削除ボタン</th>
                </tr>
            </thead>
            <tbody id="UserList">
            <!-- JavaScriptでデータがここに挿入される -->
            </tbody>
        </table>

    </main>
    <script src="js/client_list.js"></script>
    <script></script>
</body>
</html>
