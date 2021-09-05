<?php 
// $_COOKIE['クッキー名'];
$times=$_COOKIE['count'];
// 変数$timesに値が入っていなければ、0を代入する
if(!isset($times)){
    $times=0;
}else{
    $times++;
}
// setcookie関数 setcookie(クッキー名[,クッキーの値[,有効期限[,パス[,ドメイン[,セキュア]]]]])
// time()+600 クッキーの有効時間は秒単位で示す。600秒＝10分
setcookie("count",$times,time()+60);
?>

<html>
    <head>
        <title>cookie.php</title>
    </head>
        <body>
            <?php
            if($times == 0){
                print("こんにちは");
            }elseif($times == 1){
                print("２回目ですね");
            }elseif($times == 2){
                print("３回目ですね");
            }else{
                print("いっぱいきたね");
            }
            ?>
        </body>
</html>