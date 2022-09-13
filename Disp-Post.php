
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
                <form action="./ex-add.php" method="post" enctype="multipart/form-data" >
                <h1>出品したい物の画像</h1>
                <div class="disp_img">
                    <!--
                    <form method="post" enctype="multipart/form-data" accept=".png, .jpg, .jpeg, .pdf, .doc">
                        <input type="file" name="avatar">
                        <button type="submit">送信する</button>
                    </form>
                    -->
                    
                        <input type="file" name="upload" size="30" />
                        
                    
                </div>

                <div class="Product_Deta">
                    <h1>商品の詳細</h1>

                    

                    <h2>商品名</h2>
                    <input type="text" name="exhibit_name" class="Product_name" maxlength="50" />

                    <h2>シリーズタイトル</h2>
                    <select name="gacha_title_id" class="Genre_pref">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                    </select>

                    <h2>商品の説明</h2>
                    <textarea name="exhibit_text" class="Product_description" rows="10" cols="60" placeholder="ここに記入してください"></textarea>

                    <h2>必要チケット</h2>
                    <select name="ticket_type_id" class="Ticet_pref">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                    </select>

                    <h2>枚数</h2>
                    <input type="number" name="number_of_tickets" class="Ticket_required" max="10" min="1" />

                    <div class="exhibit">
                    <button class="btn btn--yellow btn--cubic" type="submit" >出品する!</button>
                    </div>
                </div>
                </form>
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
