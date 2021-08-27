<?php
    declare(strict_types=1);

    // 中身が空ではないか確認するための関数を定義
    function validate()
    {
        return ($_POST['email'] !== '' && $_POST['message'] !== '');
    }

    // セッションの始め方について書いている
    session_start();

    // 入力内容の検証（バリデーション）
    if (isset($_POST['operation']) && $_POST['operation'] === 'inquiry'){
        // 更に親切にかくならば、メールアドレスとお問い合わせ内容が書かれていない場合それぞれのメッセージがでるようにする
        if(validate() === false){
            $message = 'メールアドレス・お問合せ内容のいずれも必須入力です。';
            $data = [
                'email' => $_POST['email'],
                'message' => $_POST['message']
            ];
        }else{
            $_SESSION['data']=[
                'email' => $_POST['email'],
                'message' => $_POST['message']
            ];
            header('Location:confirm.php');
            return;
        }
    }elseif(isset($_SESSION['data'])){
        $data = [
            'email' => $_SESSION['data']['email'],
            'message' => $_SESSION['data']['message']
        ];
    }
?>

<body>
    <h2>お問合せ入力</h2>
    <!-- isset (引数) -->
    <!-- 値がセットされているかどうかを確認 -->
    <!-- 値が入っていればTRUEを返す -->
    <!-- if ( isset ( 変数1 ) ) {
            変数1がセットされているときの処理;
        }else{
            変数1がセットされていないときの処理;
        } -->
    <?php if(isset($message)): ?>
        <p style="color:red"><?= $message?></p>
        <?php endif; ?>
        <form name= "inquiry-form" action="" method="POST">
            <!-- 入力内容にミスがあったときに、再度最初から書き直すとしんどい -->
            <!-- ２回目の入力時に先ほどの入力内容が残っているようにするための記述 -->
            ●メールアドレス : <br>
            <input type="text" name="email" value="<?=isset($data['email']) ? $data['email'] : ''?>"><br>
            ●お問い合わせ内容 : <br>
            <textarea name="message" cols="30" rows="4"><?=isset($data['message'])? $data['message'] : ''?></textarea><br>
            <button type="submit" name="operation" value="inquiry" >送信</button>
    </form>
</body>