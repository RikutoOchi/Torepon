<?php
    session_start();

    // 検索条件に関するデータ
    $_SESSION["kyara"] = $_POST['kyara'];
    $_SESSION["gensaku"] = $_POST['gensaku'];
    $_SESSION["me-ka-"] = $_POST['me-ka-'];
    $_SESSION["nitizi-start"] = $_POST['nitizi-start'];
    $_SESSION["nitizi-end"] = $_POST['nitizi-end'];
    $_SESSION["syurui"] = $_POST['syurui'];
    $_SESSION["maisu-start"] = $_POST['maisu-start'];
    $_SESSION["maisu-end"] = $_POST['maisu-end'];

    header('Location:ex-list.php?sort_id=0');
?>