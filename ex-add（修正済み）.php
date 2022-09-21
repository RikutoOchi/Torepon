<!-- ヘッドの全体に関わる共有部分 -->
<?php require_once('./temp/head.php'); ?>
<?php session_start(); ?>
<!-- /ヘッドの全体に関わる共有部分 -->

<?php
    //現在時刻
    $time_data = date("Y-m-d H:i:s");
    //写真
    $img_name = $_FILES['user_icon']['name'];
    //現在時刻をファイル名にするための編集
    $img_name2 = str_replace(":", "", $time_data);
    //写真のパス名（DBに保存するやつ）
    $img = './uploads/'.$img_name2.$img_name;
    //保存する写真名
    $img_name = $img_name2.$img_name;
    //写真の保存
    move_uploaded_file($_FILES['user_icon']['tmp_name'], './uploads/' . $img_name);

    require_once __DIR__ . './classes/exhibit.php'; 
    $ex = new Exhibit( );
    $ex->ex_add($_SESSION['user_id'],$_POST['exhibit_name'], $_POST['exhibit_text'], $img,  $_POST['gacha_title_id'], $_POST['ticket_type_id'],$_POST['number_of_tickets']);
?>