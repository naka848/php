<?php 
    header('HTTP/1.1 307 Temporary Redirect');
    sleep(10);
    header('Location: http://example.com/redirected');
?>
<body>
    別のサイトにリダイレクトします。
</body>