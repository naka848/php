<?php declare(strict_types=1); ?>
<body>
    <?php
        try{
            $pdo = new PDO('mysql:host=localhost; dbname=honkaku; charset=utf8mb4','root','mariadb');
            $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
            echo '接続に成功しました。';
        }catch(PDOException $e){
            echo '接続に失敗しました。';
        }
        ?>
</body>