<?php session_start(); ?>

<!DOCTYPE html>
<html lang="ja">
    <head>
    <meta charset="UTF-8">
        <title>セッション管理</title>
    </head>
    <body>
        <?php
            // セッション変数の受け取り
            $b = $_SESSION['bridge'];
            print "ページ2の値は $b です。 \n";
        ?>
        <p><a href="session1.php">ページ1へ</a></p>
    </body>
</html>