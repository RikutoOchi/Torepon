<!-- ヘッドの全体に関わる共有部分 -->
<?php require_once('./temp/head.php'); ?>
<!-- /ヘッドの全体に関わる共有部分 -->

<!-- ↓↓↓　ここに各画面専用のスタイルのリンクタグを書きます ↓↓↓ -->
<link rel="stylesheet" href="./css/profile.css">
<!-- ↑↑↑　/ここに各画面専用のスタイルのリンクタグを書きます　↑↑↑ -->

<!-- ヘッダー -->
<?php require_once("./temp/header.php"); ?>
<!-- /ヘッダー -->

<script type="text/javascript">
  function disp(url){  
    window.open(url, "window_name", "width=600,height=400,scrollbars=yes");
  }
</script>

<script type="text/javascript">
  function disp2(url){  
    window.open(url, "window_name", "width=900,height=600,scrollbars=yes");
  }
</script>

    <main class="main-side-content">
      <section class="main-content">
        <!-- mainコンテンツ -->

        <div class="boxContainer">
          <div class="box relative" >
            <img class="img" style="margin-left:30px" src="<?= $_SESSION['user_icon_url'] ?>">
            <input type="button" class="btn2 absolute" style="margin-left:20px" value="変更する" onClick="disp2('./profile_pict.html')"/>
          </div>
          <div class="box">
            <h3>
              <p style="margin-left:50px">ユ ー ザ ー 名　：　<?php echo $_SESSION['user_name'] ?> </p>
              <br>
              <p style="margin-left:50px" style="margin-top:50px">メールアドレス ：　<?php echo $_SESSION['mail'] ?></p>
              <br>
              <p style="margin-left:50px">自己紹介　　　</p>
              <div class="box2" style="margin-left:50px">
                <?php echo $_SESSION['user_text'] ?>
              </div>
            </h3>
          </div>
        </div>

        <div class="boxContainer">
          <div class="box">
            <img class="img2" style="margin-left:30px" src="./images/test_2.jpg">
          </div>
          <div class="box">
            <input type="button" style="margin-left:500px" class="btn" value="変更する" onclick="location.href='./profile_data.php'"/>
          </div>
        </div>
        
        <div>
          <p style="margin-left:140px">評価</p>
        </div>
        
        <h2>
          <br>
          <p style="margin-left:30px">取引実績</p>
        </h2>
        <div class="box1" style="margin-left:30px">
          <h3>
            <p>過去の取引数：5件</p>
            <br>
            <p>最近の取引</p>
            <div class="div-equal-box">
              <div><a href=""><img class="img3 border" src="./images/test_3.png"></a></div>
              <div><a href=""><img class="img3 border" src="./images/test_4.png"></a></div>
              <div><a href=""><img class="img3 border" src="./images/test_5.png"></a></div>
              <div><a href=""><img class="img3 border" src="./images/test_6.png"></a></div>
              <div><a href=""><img class="img3 border" src="./images/test_7.png"></a></div>
            </div>
          </h3>
        </div>

<!--
  
        <div>
          <h2>
            <br>
            <p style="margin-left:30px">現在の出品リスト</p>
          </h2>
          <div class="box1" style="margin-left:30px">
            <h3>
              <p>総数：5件</p>
              <div class="div-equal-box">
                <div><a href=""><img class="img3 border" src="./images/test_3.png"></a></div>
                <div><a href=""><img class="img3 border" src="./images/test_4.png"></a></div>
                <div><a href=""><img class="img3 border" src="./images/test_5.png"></a></div>
                <div><a href=""><img class="img3 border" src="./images/test_6.png"></a></div>
                <div><a href=""><img class="img3 border" src="./images/test_7.png"></a></div>
              </div>
            </h3>
          </div>
-->

<!--
  
        <div>
          <h2>
            <br>
            <p style="margin-left:30px">現在の出品リスト</p>
          </h2>
          <div class="box1" style="margin-left:30px">
            <h3>
              <p>総数：5件</p>
              <div class="div-equal-box">
                <div><a href=""><img class="img3 border" src="./images/test_3.png"></a></div>
                <div><a href=""><img class="img3 border" src="./images/test_4.png"></a></div>
                <div><a href=""><img class="img3 border" src="./images/test_5.png"></a></div>
                <div><a href=""><img class="img3 border" src="./images/test_6.png"></a></div>
                <div><a href=""><img class="img3 border" src="./images/test_7.png"></a></div>
              </div>
            </h3>
          </div>
-->
      </section>
     

<!-- サイドコンテンツ -->
<?php require_once('./temp/side.php'); ?>
<!-- /サイドコンテンツ -->

</main>
<!-- /mainコンテンツ -->

<!-- フッター -->
<?php require_once('./temp/footer.php'); ?>
<!-- /フッター -->