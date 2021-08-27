<?php
    declare(strict_types=1);
    function deleteSession()
    {
        if(ini_get('session.use_cookies')){
            $params = session_get_cookie_params();
            setcookie(session_name(),'',time() - 42000,
                $params['path'],$params['domain'],$params['secure'],$params['httponly']
            );
        }
    }
    session_start();
?>

<body>
    <h2>お問合せ完了</h2>
    <p>お問合せありがとうございました。デバック情報：</p>
    <pre><?php print_r($_SESSION); ?></pre>
    <?php deleteSession(); ?>
    <?php session_destroy(); ?>
</body>
