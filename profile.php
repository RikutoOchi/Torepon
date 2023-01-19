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
    require_once __DIR__ . './classes/profile_class.php';

    $tra = new Profile();
    $dat = $tra->transaction($_SESSION['user_id']);

    $tran = new Transaction();
    $transaction = $tran->transaction_data($_SESSION['user_id']);

    foreach($dat as $data){
        $user_rating = $data['USER_RATING'];
        $trade_number = $data['USER_TRADE_COUNT'];
    }
?>

<main class="main-side-content">
    <section class="main-content">

        <!-- mainコンテンツ -->
        <div class="flex">

            <div class="a">
                <img class="UserIcon" src="<?php echo $_SESSION['user_icon_url'] ?>" alt="">
                <input type="button" class="margin-left img_change_btn" value="変更する" onclick="location.href='./profile_pict.php'"/>
                <br><br>
                <?php if($user_rating < 1.5) { ?>
                    <img class="evaluation" src="./images/評価1～1.4.png" alt="">
                <?php }elseif($user_rating < 2) { ?>
                    <img class="evaluation" src="./images/評価1.5～1.9.png" alt="">
                <?php }elseif($user_rating < 2.5) { ?>    
                    <img class="evaluation" src="./images/評価2～2.4.png" alt="">
                <?php }elseif($user_rating < 3) { ?>
                    <img class="evaluation" src="./images/評価2.5～2.9.png" alt="">
                <?php }elseif($user_rating < 3.5) { ?>
                    <img class="evaluation" src="./images/評価3～3.4.png" alt="">
                <?php }elseif($user_rating < 4) { ?>
                    <img class="evaluation" src="./images/評価3.5～3.9.png" alt="">
                <?php }elseif($user_rating < 4.5) { ?>
                    <img class="evaluation" src="./images/評価4～4.4.png" alt="">
                <?php }elseif($user_rating < 5) { ?>
                    <img class="evaluation" src="./images/評価4.5～4.9.png" alt="">
                <?php }elseif($user_rating == 5) { ?>
                    <img class="evaluation" src="./images/評価5.png" alt="">
                <?php } ?>


                <label class="evaluation_margin-left">評価</label>
            </div>

            <div class="c">
                <br>
                <h2>
                    <p style="margin-left:30px">取引実績</p>
                </h2>

                <div class="box1" style="margin-left:30px">
                    <h3>
                        <p>過去の取引数：<?php echo $trade_number ?></p>
                        <br>
                        <p>最近の取引</p>

                        <div class="div-equal-box">

                            <?php foreach($transaction as $data){ ?>
                                <div><a href="./ex-confirm.php?id=<?php echo $data['EXHIBIT_ID'] ?>"><img class="img3 border" src="<?= $data['EXHIBIT_PIC_URL'] ?>"></a></div>
                            <?php } ?>

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