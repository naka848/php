<!-- setcookie()関数 クッキーの発行。 -->
<!-- ※DOCTYPE宣言や<HTML>タグの出力より前で呼び出す -->
<!-- setcookie('クッキー名',クッキーの値,クッキーの有効期限); -->
<!-- ※有効期限を設定しないときは、ブラウザを終了するとクッキーは無効になる -->
<?php setcookie('val',100);?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>クッキー</title>
    </head>
    <body>
        <?php
            // クッキーの受け取り。クッキー情報が送られなかったときは、$getvalの値はNULLになる
            // $getval = $_COOKIE['クッキー名'];
            $getval = isset($_COOKIE['val']) ? $_COOKIE['val'] : "(なし)";
            print "ページ１の値は $getval です。\n";
        ?>
        <p><a href="cookie2.php">ページ２へ</a></p>
    </body>
</html>