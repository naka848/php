<?php 
    declare(strict_types=1);

    function connect(): PDO
    {
        $pdo = new PDO('mysql:host=localhost; dbname=login; charset=utf8mb4','root','mariadb');
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
            $statement = $pdo->prepare('INSERT INTO sign(created, userID, password) VALUES(CURRENT_TIMESTAMP,:userID,:password)');
            $statement->bindValue(':userID',$_POST['ID'],PDO::PARAM_STR);
            $statement->bindValue(':password',$_POST['pass'],PDO::PARAM_INT);
            
            // SQLを実行する
            $statement->execute();
            $newId = $pdo ->lastInsertId();
            echo '新規登録が完了しました。新しいレコードのIDは',$newId,'です。';
        }catch(PDOException $e){
            echo '新規登録に失敗しました。';
            echo $e;
        }
    ?>
</body>


