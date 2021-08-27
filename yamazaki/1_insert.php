<?php 
    declare(strict_types=1);

    function connect(): PDO
    {
        $pdo = new PDO('mysql:host=localhost; dbname=convenienceStore; charset=utf8mb4','root','mariadb');
            // PDO::ATTR_ERRMODEという属性でPDO::ERRMODE_EXCEPTIONの値を設定することでエラーが発生したときに、PDOExceptionの例外を投げてくれます
            $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
            return $pdo;
    }
?>

<body> 
    <?php
        try{
            $pdo = connect();
            $statement = $pdo->prepare('INSERT INTO products(created, name, supplier, expiryDate, price) VALUES(CURRENT_TIMESTAMP,:name,:supplier,:expiryDate,:price )');
            $statement->bindValue(':name',$_POST['item-name'],PDO::PARAM_STR);
            $statement->bindValue(':supplier',$_POST['supplier'],PDO::PARAM_STR);
            $statement->bindValue(':expiryDate',$_POST['expiryDate'],PDO::PARAM_INT);
            $statement->bindValue(':price',$_POST['item-price'],PDO::PARAM_INT);
            
            // SQLを実行する
            $statement->execute();
            $newId = $pdo ->lastInsertId();
            echo '新しい商品を登録しました。新しいレコードのIDは',$newId,'です。';
        }catch(PDOException $e){
            echo '新しい商品の登録に失敗しました。';
        echo $e;
        }
    ?>
</body>

<!-- PHPはアクセスするたびに動くもの
更新するとどんどんレコードがふえてしまう！ -->

