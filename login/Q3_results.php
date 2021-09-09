<?php
    declare(strict_types=1);

    //session_start()関数 セッション開始を宣言。セッションはPHPスクリプトの処理が終了するまで続く。
    //再度呼び出すと以前のセッションを再開する。
    //※DOCTYPE宣言や<HTML>タグの出力より前で呼び出す。
    session_start();

    require_once dirname(__FILE__) . '/functions.php';

    try {
        // もしIDが入力されていないか、空白しか入力されていない場合は、
        if (!isset($_POST['userID']) || trim($_POST['userID'])=== '') {
            echo '必要な値が入っていません。';
        }

        // functions.phpの中で定義したconnect()関数を呼び出す
        $pdo = connect();
        $statement = $pdo->prepare('SELECT * FROM sign WHERE userID = :userID');
        // bindValue ($パラメータID, $バインドする値 [, $PDOデータ型定数] )
        $statement->bindValue(':userID', $_POST['userID'], PDO::PARAM_STR);
        // 実行
        $statement->execute();

        $row = $statement->fetch(PDO::FETCH_ASSOC);
        if($row['password'] == $_POST['password']){
            header("location: ../yamazaki/1_form.php");
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