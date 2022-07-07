<!-- ヘッドの全体に関わる共有部分 -->
<?php require_once('./temp/head.php'); ?>
<!-- /ヘッドの全体に関わる共有部分 -->

<!-- ↓↓↓　ここに各画面専用のスタイルのリンクタグを書きます ↓↓↓ -->

<link rel="stylesheet" href="./css/Disp-Post_Style.css" />

<!-- ↑↑↑　/ここに各画面専用のスタイルのリンクタグを書きます　↑↑↑ -->

<!-- ヘッダー -->
<?php require_once("./temp/header.php"); ?>
<!-- /ヘッダー -->

    <main class="main-side-content">
     
        <!-- mainコンテンツ -->
        <div class="Disp-Post">
            <h1>商品の出品</h1>
            <div class="Display_images">
                <h1>出品したい物の画像 （最大5枚）</h1>
                <div class="disp_img">
                    <form method="post" enctype="multipart/form-data" accept=".png, .jpg, .jpeg, .pdf, .doc">
                        <input type="file" name="avatar">
                        <button type="submit">送信する</button>
                    </form>
                </div>

                <div class="Product_Deta">
                    <h1>商品の詳細</h1>

                    <h2>ジャンル</h2>
                    <select name="pref" class="Genre_pref">
                            <option value="G1">ジャンル１</option>
                            <option value="G2">ジャンル2</option>
                            <option value="G3">ジャンル3</option>
                    </select>

                    <h2>商品名</h2>
                    <input type="text" name="name" class="Product_name" maxlength="50" />

                    <h2>商品の説明</h2>
                    <textarea class="Product_description" rows="10" cols="60" placeholder="ここに記入してください"></textarea>

                    <h2>必要なチケットのジャンル</h2>
                    <select name="pref" class="Ticet_pref">
                            <option value="G1">ジャンル１</option>
                            <option value="G2">ジャンル2</option>
                            <option value="G3">ジャンル3</option>
                    </select>

                    <h2>枚数</h2>
                    <input type="number" name="name" class="Ticket_required" max="10" min="1" />

                    <div class="exhibit">
                        <a href="" class="btn btn--yellow btn--cubic">出品する!</a>
                    </div>
                </div>
            </div>
        </div>

<!-- サイドコンテンツ -->
<?php require_once('./temp/side.php'); ?>
<!-- /サイドコンテンツ -->

</main>
<!-- /mainコンテンツ -->

<!-- フッター -->
<?php require_once('./temp/footer.php'); ?>
<!-- /フッター -->
