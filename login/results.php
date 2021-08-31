<?php
    declare(strict_types=1);

    require_once dirname(__FILE__) . '/functions.php';

    try {
        // isset (引数)…引数には変数を指定する。変数に値がセットされているかつNULLでない場合にTRUEを返す
        // もしIDが入力されていないか、空白しか入力されていない場合は、
        if (!isset($_GET['userID']) || trim($_GET['userID'])=== '') {
            echo 'IDが未入力です。';
        }else if (!isset($_GET['password']) || trim($_GET['password'])=== '') {
            echo 'パスワードが未入力です。';
        }

        // functions.phpの中で定義したconnect()関数を呼び出す
        $pdo = connect();

        session_start();

        // SELECT フィールド名 FROM テーブル名 WHERE 列名 = 探してるもの
        // データベースの行をひっぱってくる
        $statement = $pdo->prepare('SELECT * FROM sign WHERE userID = :userID');
        // bindValue ($パラメータID, $バインドする値 [, $PDOデータ型定数] )
        $statement->bindValue(':userID', $_GET['userID'], PDO::PARAM_STR);
        // これまでに書いたSQL文の中身を実行する
        $statement->execute();

        $row = $statement->fetch(PDO::FETCH_ASSOC);
        if($row['userID'] == $_GET['userID'] && $row['password'] == $_GET['password']){
            header("location: ../yamazaki/1_form.html");
        }else if($row['userID'] != $_GET['userID'] && $row['password'] == $_GET['password']){
            echo 'IDが間違っています。';
        }else if($row['userID'] == $_GET['userID'] && $row['password'] != $_GET['password']){
            echo 'パスワードが間違っています。';
        }else{
        echo 'ログインに失敗しました！';
        }
      
    // PDOException $e…try節の中でエラーがあればエラーオブジェストが生成される
    }catch(PDOException $e){
        echo 'ログインに失敗しました。';
        // echo $e;…エラーオブジェクトの内容を教えてくれる！！！困ったらこれかく！！
        echo $e;
        return;
    }
?>

<body>

</body>