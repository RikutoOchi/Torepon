<!DOCTYPE html>
<html lang="ja">
<!-- このテストファイルを実行する際は、同梱されているchat_test.splをMyphpAdminでインポートしてください-->
<!-- また、そのファイルをXamppのhtdocsへ置いて実行してください-->


<head>
    <meta charset="utf-8">
    <title>チャット</title>
</head>

<body>
    <h1>チャット</h1>

    <form method="post" action="chat.php">
        <p>名前</p><br> <input type="text" name="name">
        <p>メッセージ</p><br> <input type="text" name="message">
        <button name="send" type="submit">送信</button>
        チャット履歴
    </form>
</body>

<section>
    <?php // DBからデータ(投稿内容)を取得 
    $stmt = select();
    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $message) {
        // 投稿内容を表示
        echo $message['time'], ":　", $message['name'], ":", $message['message'];
        echo nl2br("\n");
    }

    // 投稿内容を登録
    if (isset($_POST["send"])) {
        insert();
        // 投稿した内容を表示
        $stmt = select_new();
        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $message) {
            echo $message['time'], ":　", $message['name'], ":", $message['message'];
            echo nl2br("\n");
        }
    }

    // DB接続
    function connectDB()
    {
        $dbh = new PDO('mysql:host=localhost;dbname=chat_test', 'root', '');
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