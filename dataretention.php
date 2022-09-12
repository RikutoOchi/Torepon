<?php
    session_start();

    // 検索ボックスに入力されたことに関するデータ
    $_SESSION["select"] = $_POST['select'];
    $_SESSION["text"] = $_POST['text'];

    header('Location:SearchResults.php?sort_id=0&sarch_id=0');
?>