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
        <a href="list.php" class="list-link">一覧に戻る</a>
        <a href="index.php" class="top-link link1">TOPに戻る</a>
    </header>
    <main>
        <button class="same-btn company-modal-btn" id="company-modal-btn">所属会社一覧</button>
        <div id="company-modal" class="company">
            <div class="company-content">
                <span class="close">&times;</span>
                <h3 class="company-title">所属会社一覧</h3>
                <hr class="style2">
                <table class="company-list">
                    <tr>
                        <th></th>
                        <th nowrap>会社名</th>
                        <th nowrap>編集ボタン</th>
                        <th nowrap>削除ボタン</th>
                    </tr>
                    <!-- 行2以降省略 -->
                </table>
                <hr class="style3">
                <form class="addition-form" method="POST">
                    <div class="addition">
                        <label>会社追加はこちら　<input name="company-name"></label>
                    </div>
                    <input class="same-btn addition-btn" type="submit" value="追加">
                </form>
            </div>
        </div>
        <h2 class="sign-title">顧客編集</h2>
        <hr class="style1">
        <div class="signup-box">
            <form method="POST" id="editForm">
                <div>
                    <label>顧客名　　　　　<input maxlength="32" name="name" required id="name"></label>
                    <span class="error-message"></span>
                </div>
                <div>
                    <label nowrap>顧客名（カナ）　<input maxlength="32" pattern="^[ァ-ヶー]+$" name="kana" required id="kana"></label>
                    <span class="error-message"></span>
                </div>
                <div>
                    <label nowrap>メールアドレス　<input pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" maxlength="60" type="email" name="mail" id="mail"></label>
                    <span class="error-message"></span>
                </div>
                <div>
                    <label>電話番号　　　　<input pattern="[0-9]{2,4}[0-9]{2,4}[0-9]{3,4}" maxlength="12" type="tel" name="tel" id="tel"></label>
                    <span class="error-message"></span>
                </div>
                <div>
                    <label>性別　　　　　　<select name="gender" id="gender" required>
                        <option value="">選択してください</option>
                        <option value="1">1.どちらでもない</option>
                        <option value="2">2.男</option>
                        <option value="3">3.女</option>
                    </select>
                    </label>
                    <span class="error-message"></span>
                </div>
                <div class="birthday">
                    <label>生年月日　　　　　<input name="birthday" type="date" id="birthday" required></label>
                    <span class="error-message"></span>
                </div>
                <div>
                    <label>所属会社　　　　<select name="company_id" id="company_id" required>
                        <option value="">選択してください</option>
                        <option value="1">1.A株式会社</option>
                        <option value="2">2.B株式会社</option>
                        <option value="3">3.C株式会社</option>
                    </select>
                    </label>
                    <span class="error-message"></span>
                </div>
                <input class="same-btn client-editButton" type="submit" id="Edit" value="更新">
            </form>
        </div>
    </main>
    <script src="js/company.js"></script>
    <script src="js/client_edit.js"></script>
</body>
</html>