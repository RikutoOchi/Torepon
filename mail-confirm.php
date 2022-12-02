<!-- ヘッドの全体に関わる共有部分 -->
<?php require_once('./temp/head.php'); ?>
<!-- /ヘッドの全体に関わる共有部分 -->

<!-- ↓↓↓　ここに各画面専用のスタイルのリンクタグを書きます ↓↓↓ -->

<!-- <link rel="stylesheet" href=""> -->
<link rel="stylesheet" href="./css/mail.css" />
<script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
<!-- ↑↑↑　/ここに各画面専用のスタイルのリンクタグを書きます　↑↑↑ -->

<!-- ヘッダー -->
<?php require_once("./temp/header.php"); ?>
<!-- /ヘッダー -->

    <main class="main-side-content">
        <!-- mainコンテンツ -->
        <section class="main-content">

        <?php 
            // 一時的にセッション変数使用
            $_SESSION['name'] = $_POST['name'];
            $_SESSION['tel'] = $_POST['tel'];
            $_SESSION['postal_code'] = $_POST['postal_code'];
            $_SESSION['prefecture'] = $_POST['prefecture'];
            $_SESSION['city'] = $_POST['city'];
            $_SESSION['address1'] = $_POST['address1'];
            $_SESSION['address2'] = $_POST['address2'];
        ?>

        <div class="mail-pro">
            <h1>お客様情報</h1>
            <h1>確認</h1>

            <span>氏名</span>
            <p id="name"><?php echo $_POST['name'] ?></p>
            <span>電話番号</span>
            <p id="tel"><?php echo $_POST['tel'] ?></p>
            <span>郵便番号</span>
            <p id="postal-code"><?php echo $_POST['postal_code'] ?></p>
            <span>都道府県</span>
            <p id="prefecture"><?php echo $_POST['prefecture'] ?></p>
            <span>市区町村</span>
            <p id="city"><?php echo $_POST['city'] ?></p>
            <span>町名・番地</span>
            <p id="address1"><?php echo $_POST['address1'] ?></p>
            <span>建物名等</span>
            <p id="address2"><?php echo $_POST['address2'] ?></p>

            <br><br><br>

            <input type="button" name="submit" value="登録する" onclick="location.href='./mail_db.php'">
            <input type="button" name="submit" value="戻る" onclick="location.href='./mail-procedure.php'">
        </div>
        <!-- /mainコンテンツ -->
        </section>

<!-- サイドコンテンツ -->
<?php require_once('./temp/side.php'); ?>
<!-- /サイドコンテンツ -->

</main>
<!-- /mainコンテンツ -->

<!-- フッター -->
<?php require_once('./temp/footer.php'); ?>
<!-- /フッター -->