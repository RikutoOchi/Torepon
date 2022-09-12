<!DOCTYPE html>
<html lang="ja">

<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<script src="https://kit.fontawesome.com/95076eb005.js" crossorigin="anonymous"></script>

<main class="Chat_test">
    <form action="" method="post" onsubmit="return validate()" name="form">
        <p>名前</p>
        <div><input type="text" name="n"></div>
        <p>メッセージ</p>
        <div><textarea name="m"></textarea></div>
        <div class="chat-submit">
            <input type="submit" value="送信" name="submit">
        </div>
    </form>

</main>

<!--DBへ書き込み-->
<?php
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);
if (isset($_POST['n'])) {

    $my_nam = htmlspecialchars($_POST['n'], ENT_QUOTES); //名前を$my_namに代入
    $my_mes = htmlspecialchars($_POST['m'], ENT_QUOTES); //名前を$my_namに代入
    $dsn = "mysql:host=localhost;dbname=chat-database;charset=utf8";
    $user = "root";
    $password = "";

    try {
        $db = new PDO($dsn, $user, $password); //データベースへアクセス（PDO文）
        $db->query("INSERT INTO 'chat-tb' (ban,nam,mes,dat) 
                    VALUES (NULL,'$my_nam','$my_mes'.NOW())"); //テーブルに値を入れる（Mysqlのqueryを実行）
        //SQL文で'chat-tb'テーブルに番号・名前・メッセージ・日付の内容を取得して保存していく
    } catch (Exception $e) {
        echo $e->getMessage() . PHP_EOL; //エラー時の処理
    }

    header("<Location:>1_SERVER['PHP_SELF]</Location:>");
    exit;
}
?>
<!--DBからの取り込み-->
<?php
$dsn = "mysql:host=localhost;dbname=chat-database;charset=utf8";
$user = "root";
$password = "";
$db = new PDO($dsn, $user, $password);
$ps = $db->query("SELECT * FROM `chat-tb` ORDER BY ban DESC");

//以下〇分前のプログラム
define("SECMINUITE", 60);
define('SECHOUR', 60 * 60);
define('SECDAY', 60 * 60 * 24);
define('SECWEEK', 60 * 60 * 24 * 7);
define('SECMONTH', 60 * 60 * 24 * 30);
define('SECYEAR', 60 * 60 * 24 * 365);


function niceTime($dest, $sour)
{
    $sour = (func_num_args() == 1) ? time() : func_get_arg(1);
    $tt = $dest - $sour;

    if ($tt / SECYEAR < -1) return abs(round($tt / SECYEAR));
    if ($tt / SECMONTH < -1) return abs(round($tt / SECMONTH));
    if ($tt / SECWEEK < -1) return abs(round($tt / SECWEEK));
    if ($tt / SECDAY < -1) return abs(round($tt / SECDAY));
    if ($tt / SECHOUR < -1) return abs(round($tt / SECHOUR));
    if ($tt / SECMINUITE < -1) return abs(round($tt / SECMINUITE));
    if ($tt < 0) return abs(round($tt));

    if ($tt / SECYEAR < +1) return abs(round($tt / SECYEAR));
    if ($tt / SECMONTH < +1) return abs(round($tt / SECMONTH));
    if ($tt / SECWEEK < +1) return abs(round($tt / SECWEEK));
    if ($tt / SECDAY < +1) return abs(round($tt / SECDAY));
    if ($tt / SECHOUR < +1) return abs(round($tt / SECHOUR));
    if ($tt / SECMINUITE < +1) return abs(round($tt / SECMINUITE));
    if ($tt < 0) return abs(round($tt));
    return '現在';
}
//以上

try {
    while ($r = $ps->fetch()) {
        $beforedest = $r['dat'];
        $dest = strtotime($beforedest);
        $sour = time();
        $outstr = niceTime($dest, $sour);
?>
<div class="chat-list">
    <div class="chat-name">
        <?php
                print "{$r['nam']}";
                ?>
    </div>
    <div class="chat-message">
        <?php
                print nl2br($r['mes']);
                ?>
    </div>
</div>
<hr>
<?php }
} catch (Exception $e) {
    echo $e->getMessage() . PHP_EOL;
}
?>