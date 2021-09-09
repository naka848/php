<?php
    declare(strict_types=1);
    session_start();
?>
<body>
    <h2>ログイン情報確認</h2>
    <a href="login.php">入力画面へ戻る</a>

    <h4>●ID :</h4>
    <p><?php $a = $_SESSION['data']['userID'];
    echo $a;?></p>

    <h4>●パスワード :</h4>
    <p><?=nl2br($_SESSION['data']['password'])?></p>
    <a href="login.php">入力画面へ戻る</a>
</body>