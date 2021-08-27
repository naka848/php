<?php
    declare(strict_types=1);

    // PDOインスタンスを取得する関数
    function connect(): PDO
    {
        // 予め用意されているPDOコンストラクタが存在します
        // PDOクラスをnewでインスタンス化している
        $pdo =new PDO('mysql:host=localhost; dbname=honkaku; charset=utf8mb4','root','mariadb');
        // PDO::ATTR_ERRMODE…エラー通知方法を指定する
        // PDO::ERRMODE_EXCEPTION…例外をスローする
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // PDO::ATTR_EMULATE_PREPARES…プリペアードステートメントのエミュレーションを有効にするか否かを指定する
        // プリペアードステートメント…実行したい SQL をコンパイルした 一種のテンプレートのようなもの。パラメータ変数を使用することで SQL をカスタマイズすることが可能
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
        return $pdo;
    }

// HTMLエスケープする関数
function escape($value)
{
    return htmlspecialchars(strval($value), ENT_QUOTES | ENT_HTML5, 'UTF-8');
}