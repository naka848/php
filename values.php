<body>

<!-- MAIL;よりも左に書くとエラー -->
   <?php
   
      $itemNumber = 'abc123';

      $mailBody = <<< MAIL
      お問い合わせを受け付けました。

      ■お問い合わせ内容：
      商品番号「{$itemNumber}」について、"サイズ"と'色の種類'を教えてください。

      MAIL; 
   ?>
   <p><pre><?=$mailBody?></pre></p>
</body>