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

            <div class="mail-pro">

                <?php
                    // 一時的にセッション変数を利用
                    if(isset($_SESSION['name']) == false){
                        $_SESSION['name'] = "";
                    }
                    if(isset($_SESSION['tel']) == false){
                        $_SESSION['tel'] = "";
                    }
                    if(isset($_SESSION['postal_code']) == false){
                        $_SESSION['postal_code'] = "";
                    }
                    if(isset($_SESSION['city']) == false){
                        $_SESSION['city'] = "";
                    }
                    if(isset($_SESSION['address1']) == false){
                        $_SESSION['address1'] = "";
                    }
                    if(isset($_SESSION['address2']) == false){
                        $_SESSION['address2'] = "";
                    }
                ?>


                <h1>お客様情報</h1>

                <form action="mail-confirm.php" method="post" class="mail-input" enctype="multipart/form-data">
                    <label>
                        <span>氏名</span>
                        <input type="text" name="name" autocomplete="name" style="text-align:center;" id="mail-input" value=<?= $_SESSION['name'] ?>>
                    </label>

                    <label>
                        <span>電話番号</span>
                        <input type="tel" name="tel" autocomplete="tel" id="mail-input" value=<?= $_SESSION['tel'] ?>>
                    </label>

                    <label> 
                        <span>郵便番号</span>
                        <input type="text" name="postal_code" minlength="7" maxlength="8" pattern="\d*" autocomplete="shipping postal-code" id="mail-input" value=<?= $_SESSION['postal_code'] ?>>
                    </label>

                    <label>
                        <span>都道府県</span>
                        <select name="prefecture" autocomplete="shipping address-level1" id="mail-input">

                            <!-- 入力されていた内容の反映 -->
                            <?php if(isset($_SESSION['prefecture']) == true){ ?>
                                <option value="<?= $_SESSION['prefecture'] ?>"><?php echo $_SESSION['prefecture'] ?></option>
                            <?php } ?>
                            <!------------------------------>

                            <option value="北海道">北海道</option>
                            <option value="青森県">青森県</option>
                            <option value="岩手県">岩手県</option>
                            <option value="宮城県">宮城県</option>
                            <option value="秋田県">秋田県</option>
                            <option value="山形県">山形県</option>
                            <option value="福島県">福島県</option>
                            <option value="茨城県">茨城県</option>
                            <option value="栃木県">栃木県</option>
                            <option value="群馬県">群馬県</option>
                            <option value="埼玉県">埼玉県</option>
                            <option value="千葉県">千葉県</option>
                            <option value="東京都">東京都</option>
                            <option value="神奈川県">神奈川県</option>
                            <option value="新潟県">新潟県</option>
                            <option value="富山県">富山県</option>
                            <option value="石川県">石川県</option>
                            <option value="福井県">福井県</option>
                            <option value="山梨県">山梨県</option>
                            <option value="長野県">長野県</option>
                            <option value="岐阜県">岐阜県</option>
                            <option value="静岡県">静岡県</option>
                            <option value="愛知県">愛知県</option>
                            <option value="三重県">三重県</option>
                            <option value="滋賀県">滋賀県</option>
                            <option value="京都府">京都府</option>
                            <option value="大阪府">大阪府</option>
                            <option value="兵庫県">兵庫県</option>
                            <option value="奈良県">奈良県</option>
                            <option value="和歌山県">和歌山県</option>
                            <option value="鳥取県">鳥取県</option>
                            <option value="島根県">島根県</option>
                            <option value="岡山県">岡山県</option>
                            <option value="広島県">広島県</option>
                            <option value="山口県">山口県</option>
                            <option value="徳島県">徳島県</option>
                            <option value="香川県">香川県</option>
                            <option value="愛媛県">愛媛県</option>
                            <option value="高知県">高知県</option>
                            <option value="福岡県">福岡県</option>
                            <option value="佐賀県">佐賀県</option>
                            <option value="長崎県">長崎県</option>
                            <option value="熊本県">熊本県</option>
                            <option value="大分県">大分県</option>
                            <option value="宮崎県">宮崎県</option>
                            <option value="鹿児島県">鹿児島県</option>
                            <option value="沖縄県">沖縄県</option>
                        </select>
                    </label>

                    <label>
                        <span>市区町村</span>
                        <input type="text" name="city" autocomplete="shipping address-level2" id="mail-input" value=<?= $_SESSION['city'] ?>>
                    </label>

                    <label>
                        <span>町名・番地</span>
                        <input type="text" name="address1" autocomplete="shipping address-line1" id="mail-input" value=<?= $_SESSION['address1'] ?>>
                    </label>

                    <label>
                        <span>建物名等</span>
                        <input type="text" name="address2" autocomplete="shipping address-line2" id="mail-input" value=<?= $_SESSION['address2'] ?>>
                    </label>
                    <input type="submit" value="情報を確認する" onclick="location.href='./mail-confirm.php'">
                </form>

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