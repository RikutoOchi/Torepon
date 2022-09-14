<?php
    session_start();

    // 検索条件に関するデータ

    $id = $_GET['id'];

    $_SESSION["gatya"] = $_POST['gatya'];
    $_SESSION["kyara"] = $_POST['kyara'];
    $_SESSION["gensaku"] = $_POST['gensaku'];
    $_SESSION["me-ka-"] = $_POST['me-ka-'];
    $_SESSION["nitizi-start"] = $_POST['nitizi-start'];
    $_SESSION["syurui"] = $_POST['syurui'];
    $_SESSION["maisu-end"] = mb_convert_kana($_POST['maisu-end'],'n','UTF-8');

    if($id == 0){
        header('Location:ex-list.php?sort_id=0&sarch_id=1');
    } elseif($id == 1){
        header('Location:SearchResults.php?sort_id=0&sarch_id=1');
    }
?>