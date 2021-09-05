<body>
    <?php
        $getval = isset($_COOKIE['val']) ? $_COOKIE['val'] : "(なし)";
        print "ページ１の値は $getval です。\n";
    ?>
    <p><a href="cookie1.php">ページ1へ</a></p>
</body>