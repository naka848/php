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

            // IDは主キーなので、ダブらないようにする
            // これうまくいってないぞ！
            // うまくいったら数字と文字まぜこぜもとうろくできるか確認する
            $row = $statement->fetch(PDO::FETCH_ASSOC);
            if ($row['userID'] == $_POST['userID']) {
                echo '他のひとが使っているので他のIDにしてください!';
            }else{
                $statement->bindValue(':userID', $_POST['ID'], PDO::PARAM_STR);
            }

            // パスワードは4桁の数字じゃないとだめにする
            $matched = [];
            if(preg_match('/[0-9]{4}/u',$_POST['pass'],$matched)){
                $statement->bindValue(':password',$_POST['pass'],PDO::PARAM_INT);
            }else{
                echo 'パスワードは4桁の数字を入力してください。';
            }
            
            // SQLを実行する
            $statement->execute();
            // $newId = $pdo ->lastInsertId();
            // echo '新規登録が完了しました。新しいレコードのIDは',$newId,'です。';
            header('Location: localhost',true,307);
        }catch(PDOException $e){
            echo '新規登録に失敗しました。';
            echo $e;
        }
    ?>
</body>


