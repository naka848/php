<?php
    declare(strict_types=1);

    require_once dirname(__FILE__) . '/functions.php';

    //メインルーチン
    // 文法エラーがないかチェックするためのTRY-CATCH。
    // これとは別に知らないひとがきたらエラーがおきるようにする
    try {
        // isset (引数)…引数には変数を指定する。変数に値がセットされているかつNULLでない場合にTRUEを返す
        // もしIDが入力されていないか、空白しか入力されていない場合は、
        if (!isset($_GET['userID']) || trim($_GET['userID'])=== '') {
            // $errorMessage = 'IDが未入力です。';
            // $echo = $errorMessage;
            echo 'IDが未入力です。';
            // return;
        // もしパスワードが入力されていないか、空白しか入力されていない場合は、
        }else if (!isset($_GET['password']) || trim($_GET['password'])=== '') {
            echo 'パスワードが未入力です。';
            // return;
        }

        // functions.phpの中で定義したconnect()関数を呼び出す
        $pdo = connect();

        // もしデータベースサーバーが正常に文を準備する場合、 PDO::prepare() は PDOStatement オブジェクトを返します。
        // SELECT フィールド名 FROM テーブル名 WHERE 列名 = 探してるもの
        // データベースの行をひっぱってくる
        $statement = $pdo->prepare('SELECT * FROM sign WHERE userID = :userID');
        // bindvalue()…プリペアドステートメントで使用するSQL文の中で、変数の値をバインドするための関数
        // bindValue ($パラメータID, $バインドする値 [, $PDOデータ型定数] )
        // $statement->bindValue(':name', '%' . $_GET['name'] . '%', PDO::PARAM_STR);
        $statement->bindValue(':userID', $_GET['userID'], PDO::PARAM_STR);
        // これまでに書いたSQL文の中身を実行する
        $statement->execute();

        $row = $statement->fetch(PDO::FETCH_ASSOC);
        if($row['userID'] == $_GET['userID'] && $row['password'] == $_GET['password']){
            // 同じフォルダ内の登録にはとべる
            // header("location: touroku.html");
            header("location: ../yamazaki/1_form.html");
        }else if($row['userID'] != $_GET['userID'] && $row['password'] == $_GET['password']){
            echo 'IDが間違っています。';
        }else if($row['userID'] == $_GET['userID'] && $row['password'] != $_GET['password']){
            echo 'パスワードが間違っています。';
        }else{
        echo 'ログインに失敗しました！';
        }

        // if ($_GET['userID'] == ":userID" && $_GET['password'] == ":password") {
        //     echo 'ログインに成功しました。';
        // }

        
    // PDOException $e…try節の中でエラーがあればエラーオブジェストが生成される
    }catch(PDOException $e){
        echo 'ログインに失敗しました。';
        // echo $e;…エラーオブジェクトの内容を教えてくれる！！！困ったらこれかく！！
        echo $e;
        return;
    }
?>
<body>
    <!-- 入力した値をいれてる。DBの値をひっぱってくる方がいい -->
    <!-- <h3><?=escape(':userID')?>さんのログインが完了しました。</h3> -->
    <!-- ログインできてるよ -->
    <!-- <table border="1">
        <tr>
            <th>商品名</th>
            <th>価格</th>
            <th>賞味期限</th>
        </tr> -->
        <!-- PDO::FETCH_ASSOC…カラム名をキーとした連想配列を返す -->
        <!-- $statement->fetch()…statementインスタンスがもっているfetch()メソッドの呼び出し。→は、他の言語ではピリオドで表されることが多いかも？ -->
        <?php while ($row = $statement->fetch(PDO::FETCH_ASSOC)):?>
            <tr>
                <td><?=escape($row['name'])?></td>
                <td><?=escape(number_format($row['price']))?>円</td>
                <td><?=escape($row['expiryDate'])?></td>
            </tr>
            <?php endwhile; ?>
    </table>
</body>