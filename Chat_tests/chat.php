<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>チャット</title>
</head>

<body>
    <h1>チャット</h1>

    <form method="post" action="chat.php">
        名前　　　　<input type="text" name="name">
        メッセージ　<input type="text" name="message">
        <button name="send" type="submit">送信</button>
        チャット履歴
    </form>
</body>

<section>
    <?php // DBからデータ(投稿内容)を取得 
    $stmt = select();
    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $message) {
        // 投稿内容を表示
        echo $message['time'], "：　", $message['name'], "：", $message['message'];
        echo nl2br("\n");
    }

    // 投稿内容を登録
    if (isset($_POST["send"])) {
        insert();
        // 投稿した内容を表示
        $stmt = select_new();
        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $message) {
            echo $message['time'], "：　", $message['name'], "：", $message['message'];
            echo nl2br("\n");
        }
    }

    // DB接続
    function connectDB()
    {
        $dbh = new PDO('mysql:host=localhost;dbname=chat', 'root', '');
        return $dbh;
    }

    // DBから投稿内容を取得
    function select()
    {
        $dbh = connectDB();
        $sql = "SELECT * FROM message ORDER BY time";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        return $stmt;
    }