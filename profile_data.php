<!-- ヘッドの全体に関わる共有部分 -->
<?php require_once('./temp/head.php'); ?>
<!-- /ヘッドの全体に関わる共有部分 -->

<!-- ↓↓↓　ここに各画面専用のスタイルのリンクタグを書きます ↓↓↓ -->
<link rel="stylesheet" href="./css/profile_data.css">
<!-- ↑↑↑　/ここに各画面専用のスタイルのリンクタグを書きます　↑↑↑ -->

<!-- ヘッダー -->
<?php require_once("./temp/header.php"); ?>
<!-- /ヘッダー -->

<main class="main-side-content">
    <section class="main-content">

        <!-- mainコンテンツ -->
        <center><h1><p>プロフィール情報変更</p></h1></center>
        <br><br>

        <form action="./profile_data_db.php" method="post" enctype="multipart/form-data" >

            <p class="margin_left">ユ ー ザ ー 名　　：　　<input type="text" name="user_name" class="size"></p>
            <br>
            <p class="margin_left">メールアドレス 　：　　<input type="text" name="address"  class="size"></p>
            <br>
            <p class="margin_left">自己紹介</p>
            <textarea name="appeal" class="margin_left textarea_size" rows="5"></textarea>
            <br><br>

            <center>
                <input type="button" value="　キャンセル　" onclick="location.href='./profile.php'"/>
                　　　　　
                <button type="submit" >　変 更 す る　</button>
            </center>

        </form>
        
    </section>
     

<!-- サイドコンテンツ -->
<?php require_once('./temp/side.php'); ?>
<!-- /サイドコンテンツ -->

</main>
<!-- /mainコンテンツ -->

<!-- フッター -->
<?php require_once('./temp/footer.php'); ?>
<!-- /フッター -->