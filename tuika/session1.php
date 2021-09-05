<!-- session_start()関数 セッション開始を宣言。セッションはPHPスクリプトの処理が終了するまで続く。
　　　　　　　　　　　　　　再度呼び出すと以前のセッションを再開する。
※DOCTYPE宣言や<HTML>タグの出力より前で呼び出す。 -->
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="ja">
    <head>
    <meta charset="UTF-8">
        <title>セッション管理</title>
    </head>
    <body>
        <?php
            // $_SESSION セッション変数
            // セッション変数の登録
            $_SESSION['bridge'] = 100;
            // セッション変数の受け取り
            $b = $_SESSION['bridge'];
            print "ページ1の値は $b です。 \n";
        ?>
        <p><a href="session2.php">ページ2へ</a></p>
    </body>
</html>