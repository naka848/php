<?php
    declare(strict_types=1);

    session_start();

    // $_SESSION セッション変数
    // セッション変数の登録
    $_SESSION['data'] =[
        'userID' => $_POST['userID'],
        'password' => $_POST['password'],
    ]

?>

<!DOCTYPE html>
<html lang="ja">

    <head>
        <meta charset="UTF-8">
        <title>My first Vue app</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
            crossorigin="anonymous"></script>
    
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"
            integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"
            integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj"
            crossorigin="anonymous"></script>
    
        <script src="https://unpkg.com/vue@next"></script>
    </head>

<body>
    <h1 class="bg-info text-white h3 p-3">ログイン画面</h1>
    <form name="search-form" action="results.php" method="POST">

        　ID　　　：<input type="text" name="userID" value="">
        <br>
        　パスワード：<input type="password" name="password" value="">

        <button type="submit" name="operation" value="search" class="btn btn-primary">ログイン</button>
    </form>
    <br>
    <p>アカウントをお持ちでない方はこちら</p>
    <button onclick="location.href='touroku.html'">新規登録</button>
</body>
</html>
