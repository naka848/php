<?php
    declare(strict_types=1);
    session_start();
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
    <h1>コンビニ店員さん操作画面</h1>
    <p>ログインしてる人：<?=$_SESSION['data']['userID'];?></p>
    <p>ログイン日時　：<?php
        $today = date("Y-m-d H:i:s");
        print_r($today)
?></p>
    <h1 class="bg-info text-white h3 p-3">商品登録フォーム</h1>
    <form action="1_insert.php" method="post" class="w-25 m-3">
        <div class="form-group">
            <lavel for="item1">商品名</lavel>
                <input type="text" name="item-name" class="form-control" id="item1">
                <!-- <small class="form-text">商品名を入力してください。</small> -->
        </div>

        <div class="form-group">
            <lavel for="item2">仕入先</lavel>
                <input type="text" name="supplier" class="form-control" id="item2">
        </div>

        <div class="form-group">
            <lavel for="item3">賞味期限</lavel>
                <input type="text" name="expiryDate" class="form-control" id="item3">
        </div>

        <div class="form-group">
            <lavel for="item4">価格</lavel>
                <input type="text" name="item-price" class="form-control" id="item4">
        </div>

        <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="check">
                <label class="form-check-label" for="check">Check box</label>
        </div>

        <button type="submit" class="btn btn-primary">送信</button>
 
    </form>

    <h1 class="bg-info text-white h3 p-3">商品検索フォーム</h1>
    <form name="search-form" action="2_results.php" method="GET">
        <input type="text" name="name" value="" class="form-control w-25 m-3">
        <button type="submit" name="operation" value="search" class="btn btn-primary m-3">検索実行</button>
    </form>
</body>
</html>
