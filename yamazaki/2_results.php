<?php
    declare(strict_types=1);

    require_once dirname(__FILE__) . '/2_functions.php';

    //メインルーチン
    try {
        // isset (引数)…引数には変数を指定する。変数に値がセットされているかつＮＵＬＬでない場合にＴＲＵＥを返す
        if (!isset($_GET['name']) || trim($_GET['name'])=== '') {
            return;
        }
        $pdo = connect();
        $statement = $pdo->prepare('SELECT * FROM products WHERE name LIKE :name ORDER BY price DESC');
        // bindvalue()…プリペアドステートメントで使用するSQL文の中で、変数の値をバインドするための関数
        // bindValue ($パラメータID, $バインドする値 [, $PDOデータ型定数] )
        $statement->bindValue(':name', '%' . $_GET['name'] . '%', PDO::PARAM_STR);
        $statement->execute();
    // PDOException $e…try節の中でエラーがあればエラーオブジェストが生成される
    }catch(PDOException $e){
        echo '商品の検索に失敗しました。';
        // echo $e;…エラーオブジェクトの内容を教えてくれる！！！困ったらこれかく！！
        echo $e;
        return;
    }
?>
<body>
    <h3>商品名に「<?=escape($_GET['name'])?>」を含む商品の検索結果</h3>
    <table border="1">
        <tr>
            <th>商品名</th>
            <th>価格</th>
            <th>賞味期限</th>
        </tr>
        <!-- PDO::FETCH_ASSOC…カラム名をキーとした連想配列を返す -->
        <!-- $statement->fetch()…statementインスタンスがもっているfetch()メソッドの呼び出し。→は、他の言語ではピリオドで表されることが多いかも？ -->
        <?php while ($row = $statement->fetch(PDO::FETCH_ASSOC)):?>
            <tr>
                <td><?=escape($row['name'])?></td>
                <td><?=escape(number_format($row['price']))?>円</td>
                <td><?=escape($row['expiryDate'])?></td>
            </tr>
            <?php endwhile; ?>
    </table>
</body>