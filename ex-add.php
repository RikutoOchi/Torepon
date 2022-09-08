<!-- ヘッドの全体に関わる共有部分 -->
<?php require_once('./temp/head.php'); ?>
<?php session_start(); ?>
<!-- /ヘッドの全体に関わる共有部分 -->

<?php
    $uploadfile = __DIR__.'/./uploads/exhibit_pic_name.jpeg';
 
    // アップロードされたファイルに、パスとファイル名を設定して保存
    move_uploaded_file($_FILES['upload']['tmp_name'], $uploadfile);

    require_once __DIR__ . './classes/exhibit.php'; 
    $ex = new Exhibit( );
    $ex->ex_add($_SESSION['user_id'],$_POST['exhibit_name'], $_POST['exhibit_text'], $_POST['gacha_title_id'], $_POST['ticket_type_id'],$_POST['number_of_tickets']);
?>