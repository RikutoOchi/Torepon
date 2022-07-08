<?php require_once('./temp/head.php'); ?>

<link rel="stylesheet" href="./css/login.css">

<!------------------- 認証コード ------------------->
<?php

    session_start();

    $mail = $_SESSION['mail'];
    $password = $_SESSION['password'];

    $data = rand();

    $_SESSION['code'] = $data;

    mb_language("Japanese"); 
    mb_internal_encoding("UTF-8");
    
    //送信元のメールアドレス
    $from = 'bmkfc77476@yahoo.co.jp';
    //送信先のメールアドレス
    $to = $mail;
    //件名
    $subject = '【トレポン】登録認証パスワード';
    //本文
    $message = 'コードは、「' . $data . '」です';

?>
<!---------------------------------------------------->

<?php if (mb_send_mail($to, $subject, $message, 'From: ' . $from)) { ?>
    <form action="./register_db.php" method="post" name="d_form">
        <label for="code" class="label-text">認証コードを入力してください。</label>
        <div class="email_box">
          <div class="text_inner">
            <input type="code" id="code" class="email_text" name="code" />
            <div class="code_string">認証コードを入力</div>
          </div>
        </div>
        <div class="login-btn-center">
          <input type="button" value="次へ" class="login-btn" onclick="document.d_form.submit();"/>
        </div>
    </form>  
<?php } else { ?>
    <center>送信失敗。
    <br>
    <?php echo'エラーログを確認してください。 (xampp\sendmail\error.log)' ?>
    </center>
<?php } ?>