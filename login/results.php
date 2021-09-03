<?php
    declare(strict_types=1);

    require_once dirname(__FILE__) . '/functions.php';

    try {
        // isset (引数)…引数には変数を指定する。変数に値がセットされているかつNULLでない場合にTRUEを返す
        // もしIDが入力されていないか、空白しか入力されていない場合は、
        if (!isset($_POST['userID']) || trim($_POST['userID'])=== '') {
            echo '必要な値が入っていません。';
        }
        // else if (!isset($_GET['password']) || trim($_GET['password'])=== '') {
        //     echo 'パスワードが未入力です。';
        // }

        // functions.phpの中で定義したconnect()関数を呼び出す
        $pdo = connect();

        session_start();

        // SELECT フィールド名 FROM テーブル名 WHERE 列名 = 探してるもの
        // データベースの行をひっぱってくる
        $statement = $pdo->prepare('SELECT * FROM sign WHERE userID = :userID');
        // bindValue ($パラメータID, $バインドする値 [, $PDOデータ型定数] )
        $statement->bindValue(':userID', $_POST['userID'], PDO::PARAM_STR);
        // これまでに書いたSQL文の中身を実行する
        $statement->execute();

        $row = $statement->fetch(PDO::FETCH_ASSOC);
        // IDがまちがってることはないからいらないかも
        // if($row['userID'] == $_GET['userID'] && $row['password'] == $_GET['password']){
        //     header("location: ../yamazaki/1_form.php");
        // }else if($row['userID'] != $_GET['userID'] && $row['password'] == $_GET['password']){
        //     echo 'IDが間違っています。';
        // ＝＝＝の方がいいかもしれないが、これだと完全一致になるので、型が合わないとfalseになる
        if($row['password'] == $_POST['password']){
            header("location: ../yamazaki/1_form.php");
        // }else if($row['userID'] == $_POST['password'] && $row['password'] != $_POST['password']){
        //     echo 'パスワードが間違っています。';
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