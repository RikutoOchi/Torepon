<?php
    session_start();

    $_SESSION["select"] = $_POST['select'];
    $_SESSION["text"] = $_POST['text'];

    header('Location:SearchResults.php?id=0');
?>