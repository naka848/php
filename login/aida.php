<?php
    declare(strict_types=1);

    session_start();

    // IDとパスワードが空じゃなかったら、
    if ($_POST['userID']!==''&&$_POST['password']!=='') {

    // $_SESSION セッション変数
        // セッション変数の登録
        $_SESSION['data'] =[
        'userID' => $_POST['userID'],
        'password' => $_POST['password'],
    ];
        // confirm.phpにリダイレクト
        header('Location:confirm.php');
    }

?>
