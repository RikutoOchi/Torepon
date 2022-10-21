<?php

    session_start();

    //現在時刻
    $time_data = date("Y-m-d H:i:s");

    // ユーザーIDの取得
    $user_id = $_SESSION['user_id'];

    //写真
    $img_name = $_FILES['user_icon']['name'];
    //現在時刻をファイル名にするための編集
    $img_name2 = str_replace(":", "", $time_data);
    //写真のパス名（DBに保存するやつ）
    $img = './images/'.$img_name2.$img_name;
    //保存する写真名
    $img_name = $img_name2.$img_name;
    //写真の保存
    move_uploaded_file($_FILES['user_icon']['tmp_name'], './images/' . $img_name);

    $pdo = new PDO('mysql:host=localhost;dbname=torepon;charset=utf8','shopping','site');
     
    $stmt = $pdo->prepare('UPDATE USERS SET USER_ICON_URL = :user_icon_url where USER_ID = :user_id');

     // 値をセット
     $stmt->bindValue(':user_icon_url', $img);
     $stmt->bindValue(':user_id', $user_id);

     $_SESSION['user_icon_url'] = $img;     // アイコン
      
     // SQL実行
     $stmt->execute();
 
     $pdo = null;
 
     header('Location:profile.php');

?>