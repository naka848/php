<?php
    declare(strict_types=1);
    session_start();
?>
<body>
    <h2>入力内容確認</h2>

    <h4>●ID :</h4>
    <p><?=$_SESSION['data']['userID'];?></p>

    <h4>●パスワード :</h4>
    <p><?=nl2br($_SESSION['data']['password'])?></p>

    <a href="results.php">ログインする</a>
    <br>
    <a href="login.php">入力画面へ戻る</a>
</body>