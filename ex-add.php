<!-- ヘッドの全体に関わる共有部分 -->
<?php require_once('./temp/head.php'); ?>
<?php session_start(); ?>
<!-- /ヘッドの全体に関わる共有部分 -->
<?php
    //現在時刻の取得
    date_default_timezone_set ('Asia/Tokyo');   // 日本時間に設定
    $time_data = date('Y-m-d H:i:s');   // チャット時間の取得

    //現在時刻をファイル名にするための編集
    $img_name = str_replace(":", "", $time_data);

    $uploadfile = __DIR__.'/./uploads/'.$img_name.'.jpeg';
    $uploadfile2 = './uploads/'.$img_name.'.jpeg';
 
    // アップロードされたファイルに、パスとファイル名を設定して保存
    move_uploaded_file($_FILES['upload']['tmp_name'], $uploadfile);

    require_once __DIR__ . './classes/exhibit.php'; 
    $ex = new Exhibit( );
    $ex->ex_add($_SESSION['user_id'],$_POST['exhibit_name'], $_POST['exhibit_text'], $_POST['gacha_title_id'], $_POST['ticket_type_id'],$_POST['number_of_tickets'],$uploadfile2);
    ?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/ex-add.css">
    <title>出品完了画面</title>
</head>
<body>
    <h1 class="copy-text">出品が完了しました</h1>
<div class="btn-center">
<input type="button" value="ホームへ戻る" class="btn"  onclick="location.href='./index.php'"/>
<input type="button" value="他の商品を出品する" class="btn"  onclick="location.href='./Disp-Post.php'"/>
</div>
</body>
</html>
