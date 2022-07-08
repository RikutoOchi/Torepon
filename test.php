<?php
//送信元のメールアドレス
$from = 'bmkfc77476@yahoo.co.jp';
//送信先のメールアドレス
$to = 'terasakinaoto@gmail.com';
//件名
$subject = 'テスト送信';
//本文
$message = 'こんにちは。これはテスト送信です。';

if (mb_send_mail($to, $subject, $message, 'From: ' . $from)) {
    echo '送信成功！';
} else {
    echo '送信失敗。<br>エラーログを確認してください。 (xampp\sendmail\error.log)';
}