<?php
    declare(strict_types=1);

    require_once dirname(__FILE__) . '/functions.php';

    //メインルーチン
    try {
        // isset (引数)…引数には変数を指定する。変数に値がセットされているかつNULLでない場合にTRUEを返す
        // もしタイトルが入力されていないか、空白しか入力されていない場合は、
        if (!isset($_GET['title']) || trim($_GET['title'])=== '') {
            // 空白のページを返す
            return;
        }
        // functions.phpの中で定義したconnect()関数を呼び出す
        // ファイルを分けてある理由は、よく使うしバグったときにどこにミスがあるか探しやすくするため
        $pdo = connect();
        // SQL文をかく。:titleは変数みたいなもの
        // $pdoはインスタンス（functions.php参照）
        $statement = $pdo->prepare('SELECT * FROM books WHERE title LIKE :title ORDER BY published DESC');
        // bindvalue()…プリペアドステートメントで使用するSQL文の中で、変数の値をバインドするための関数
        // bindValue ($パラメータID, $バインドする値 [, $PDOデータ型定数] )
        // bindは束縛の意味。:titleって変数の中身をここでかいている
        $statement->bindValue(':title', '%' . $_GET['title'] . '%', PDO::PARAM_STR);
        // これまでに書いたSQL文の中身を実行する
        $statement->execute();
    // PDOException $e…try節の中でエラーがあればエラーオブジェストが生成される
    }catch(PDOException $e){
        echo '本の検索に失敗しました。';
        // echo $e;…エラーオブジェクトの内容を教えてくれる！！！困ったらこれかく！！
        echo $e;
        return;
    }
?>
<body>
    <h3>タイトルに「<?=escape($_GET['title'])?>」を含む書籍の検索結果</h3>
    <table border="1">
        <tr>
            <th>タイトル</th>
            <th>価格</th>
            <th>発売日</th>
        </tr>
        <!-- PDO::FETCH_ASSOC…カラム名をキーとした連想配列を返す -->
        <!-- $statement->fetch()…statementインスタンスがもっているfetch()メソッドの呼び出し。→は、他の言語ではピリオドで表されることが多いかも？ -->
        <!-- $rowは急にここで宣言した配列 -->
        <!-- $statementにはphpの実行結果が入っている -->
        <!-- $statementの中身のSQL文はphpが読める形ではないので、fetchでPHPがわかるようにしてあげる -->
        <?php while ($row = $statement->fetch(PDO::FETCH_ASSOC)):?>
            <tr>
                <td><?=escape($row['title'])?></td>
                <td><?=escape(number_format($row['price']))?>円</td>
                <td><?=escape($row['published'])?></td>
            </tr>
            <?php endwhile; ?>
    </table>
</body>