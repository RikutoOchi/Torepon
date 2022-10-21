<!-- ヘッドの全体に関わる共有部分 -->
<?php require_once('./temp/head.php'); ?>
<!-- /ヘッドの全体に関わる共有部分 -->

<!-- ↓↓↓　ここに各画面専用のスタイルのリンクタグを書きます ↓↓↓ -->
<link rel="stylesheet" href="./css/profile.css">
<!-- ↑↑↑　/ここに各画面専用のスタイルのリンクタグを書きます　↑↑↑ -->

<!-- ヘッダー -->
<?php require_once("./temp/header.php"); ?>
<!-- /ヘッダー -->

<?php
    // 取引件数の取得SQL
    require_once __DIR__ . './classes/dbdata.php';
    $cou = new Dbdata();
    $number_of_transactions = $cou->getRecord('users','USER_ID', $_SESSION['user_id']);
?>

<main class="main-side-content">
    <section class="main-content">

        <!-- mainコンテンツ -->
        <div class="flex">

            <div class="a">
                <img class="UserIcon" src="<?php echo $_SESSION['user_icon_url'] ?>" alt="">
                <input type="button" class="margin-left img_change_btn" value="変更する" onclick="location.href='./profile_pict.php'"/>
                <br><br>
                <img class="evaluation" src="<?php /*評価の画像*/ ?>" alt="">
                <label class="evaluation_margin-left">評価</label>
            </div>

            <div class="c">
                <br>
                <h2>
                    <p style="margin-left:30px">取引実績</p>
                </h2>

                <div class="box1" style="margin-left:30px">
                    <h3>
                        <p>過去の取引数：<?php echo $number_of_transactions['USER_TRADE_COUNT'] ?></p>
                        <br>
                        <p>最近の取引</p>

                        <div class="div-equal-box">
                            <div><a href="<?php ?>"><img class="img3 border" src="<?php ?>"></a></div>
                            <div><a href="<?php ?>"><img class="img3 border" src="<?php ?>"></a></div>
                            <div><a href="<?php ?>"><img class="img3 border" src="<?php ?>"></a></div>
                            <div><a href="<?php ?>"><img class="img3 border" src="<?php ?>"></a></div>
                            <div><a href="<?php ?>"><img class="img3 border" src="<?php ?>"></a></div>
                        </div>
                    </h3>
                </div>

            </div>

            <div class="b">
                <br>
                <label class="display display_line">ユーザーネーム　：　<?php echo $_SESSION['user_name'] ?></label>
                <br><br>
                <label class="display display_line">メールアドレス　：　<?php echo $_SESSION['mail'] ?></label>
                <br><br>
                <div>
                    <label class="display">自己紹介</label>
                    <br>
                    <textarea class="display textarea" cols="50" rows="6" readonly><?php echo $_SESSION['user_text'] ?></textarea>
                    <br><br>
                    <div class="btn"><input type="button" class="info_change_btn" value="変更する" onclick="location.href='./profile_data.php'"/></div>
                <div>
            </div>
            
        </div>

    </section>
     

<!-- サイドコンテンツ -->
<?php require_once('./temp/side.php'); ?>
<!-- /サイドコンテンツ -->

</main>
<!-- /mainコンテンツ -->

<!-- フッター -->
<?php require_once('./temp/footer.php'); ?>
<!-- /フッター -->