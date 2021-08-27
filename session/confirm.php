<?php
    declare(strict_types=1);
    session_start();
?>
<body>
    <h2>お問合せ確認</h2>

    <h4>●メールアドレス :</h4>
    <p><?=$_SESSION['data']['email']?></p>

    <h4>●お問い合わせ内容 :</h4>
    <p><?=nl2br($_SESSION['data']['message'])?></p>
</body>