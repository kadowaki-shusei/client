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
        <a href="list.php">一覧に戻る</a>
        <a href="index.php">TOPに戻る</a>
    </header>
    <main>
    <button class="same-btn company-modal-btn" id="company-modal-btn">所属会社一覧</button>
            <div id="company-modal" class="company">
                <div class="company-content">
                <span class="close">&times;</span>
                <h3 class="company-title">所属会社一覧</h3>
                <hr class="style2">
                <table class="company-list">
                        <tr><!-- 行1（見出し）-->
                            <th></th>
                            <th nowrap>会社名</th>
                            <th nowrap>編集ボタン</th>
                            <th nowrap>削除ボタン</th>
                        </tr>

                        <tr><!-- 行2 -->
                            <td>1</td>
                            <td class="company-name" nowrap>〇〇〇 〇〇〇 </td>
                            <td><button onclick="update" class="same-btn updateButton">編集</button><button onclick="save" class="saveButton" style="display:none;">保存</button></li></td>
                            <td><button onclick="dalete"class="same-btn deleteButton">削除</button></li></td>
                        </tr>
                        <tr><!-- 行2 -->
                            <td>2</td>
                            <td class="company-name" nowrap>〇〇〇 〇〇〇 </td>
                            <td><button onclick="update" class="same-btn updateButton">編集</button><button onclick="save" class="saveButton" style="display:none;">保存</button></li></td>
                            <td><button onclick="dalete"class="same-btn deleteButton">削除</button></li></td>
                        </tr>
                        <tr><!-- 行2 -->
                            <td>3</td>
                            <td class="company-name" nowrap>〇〇〇 〇〇〇 </td>
                            <td><button onclick="update" class="same-btn updateButton">編集</button><button onclick="save" class="saveButton" style="display:none;">保存</button></li></td>
                            <td><button onclick="dalete"class="same-btn deleteButton">削除</button></li></td>
                        </tr>
                        <tr><!-- 行2 -->
                            <td>4</td>
                            <td class="company-name" nowrap>〇〇〇 〇〇〇 </td>
                            <td><button onclick="update" class="same-btn updateButton">編集</button><button onclick="save" class="saveButton" style="display:none;">保存</button></li></td>
                            <td><button onclick="dalete"class="same-btn deleteButton">削除</button></li></td>
                        </tr>
                        <tr><!-- 行2 -->
                            <td>5</td>
                            <td class="company-name" nowrap>〇〇〇 〇〇〇 </td>
                            <td><button onclick="update" class="same-btn updateButton">編集</button><button onclick="save" class="saveButton" style="display:none;">保存</button></li></td>
                            <td><button onclick="dalete"class="same-btn deleteButton">削除</button></li></td>
                        </tr>
                        <tr><!-- 行2 -->
                            <td>6</td>
                            <td class="company-name" nowrap>〇〇〇 〇〇〇 </td>
                            <td><button onclick="update" class="same-btn updateButton">編集</button><button onclick="save" class="saveButton" style="display:none;">保存</button></li></td>
                            <td><button onclick="dalete"class="same-btn deleteButton">削除</button></li></td>
                        </tr>
                        <tr><!-- 行2 -->
                            <td>7</td>
                            <td class="company-name" nowrap>〇〇〇 〇〇〇 </td>
                            <td><button onclick="update" class="same-btn updateButton">編集</button><button onclick="save" class="saveButton" style="display:none;">保存</button></li></td>
                            <td><button onclick="dalete"class="same-btn deleteButton">削除</button></li></td>
                        </tr>
                    </table>
                <hr class="style3">
                <form class="addition-form" method="POST" action="addition">
                    <div class="addition">
                        <label>会社追加はこちら　<input name="company-name"></label>
                    </div>
                <input class="same-btn addition-btn" type="submit" value="追加">
                </form>
                </div>
            </div>
            

            

        <h2 class="sign-title">顧客情報編集</h2>
        <hr class="style1">

        <div class="signup-box">
            <form method="POST" id="editForm">
                <div>
                   <label>顧客名　　　　　<input id="name" name="name"></label>
                </div>

                <div>
                    <label>顧客名（カナ）　<input id="kana" name="kana"></label>
                </div>

                <div>
                   <label>メールアドレス　<input type="email" id="mail" name="mail"></label>
                </div>

                <div>
                    <label>電話番号　　　　<input type="tel" id="tel" name="tel"></label>
                </div>

                <div>
                    <label>性別　　　　　　<select id="gender" name="gender">
                        <option value="1">1.男</option>
                        <option value="2">2.女</option>
                        <option value="3">3.どちらでもない</option>
                        </select>
                    </label>
                </div>

                <div class="date">
                        <label>生年月日　　　　<input id="birthday" name="birthday"type="date"></label>                    
                </div>

                <div>
                    <label>所属会社　　　　<select id="company_id" name="company_id">
                            <option value="1">1.A株式会社</option>
                            <option value="2">2.B株式会社</option>
                            <option value="3">3.C株式会社</option>
                        </select>
                    </label>
        </div>
                <input class="same-btn client-editButton" onclick="edit();" id="Edit" type="button" value="更新">
            </form>
        <hr class="style1">    
    </main>
    <script src="js/company.js"></script>
    <script src="js/client_edit.js"></script>
</body>
</html>