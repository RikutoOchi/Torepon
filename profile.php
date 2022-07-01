
<!-- ヘッドの全体に関わる共有部分 -->
<?php
$data['user_name'] = 'テストタロウ';
$data['user_id'] = 'テストしたろう';
require_once('./temp/head.php'); ?>
<!-- /ヘッドの全体に関わる共有部分 -->

<!-- ↓↓↓　ここに各画面専用のスタイルのリンクタグを書きます ↓↓↓ -->
<link rel="stylesheet" href="./css/profile.css">
<script type="text/javascript">
  function disp(url){  
    window.open(url, "window_name", "width=600,height=400,scrollbars=yes");
  }
</script>

<!-- ↑↑↑　/ここに各画面専用のスタイルのリンクタグを書きます　↑↑↑ -->

<!-- ヘッダー -->
<?php require_once("./temp/header.php"); ?>
<!-- /ヘッダー -->

    <main class="main-side-content">
      <section class="main-content">
        <!-- mainコンテンツ -->

        <div class="boxContainer">
          <div class="box relative" >
            <img class="img" style="margin-left:30px" src="./images/test_1.jpeg">
            <input type="button" class="btn2 absolute" value="変更する" onClick="disp('./profile_pict.html')"/>
          </div>
          <div class="box">
            <h2>
              <p style="text-align:right">ユーザー名　 ：　<?php echo $data['user_name'] ?></p>
              <p style="text-align:right">ユーザーID　：　<?php echo $data['user_id'] ?></p>
            </h2>
            <br>
            <p style="margin-left:50px">自己紹介　　　</p>
            <textarea style="margin-left:50px" rows="4" cols="60" readonly></textarea>
          </div>
        </div>

        <div class="boxContainer">
          <div class="box">
            <img class="img2" style="margin-left:30px" src="./images/test_2.jpg">
          </div>
          <div class="box">
            <input type="button" style="margin-left:500px" class="btn" value="変更する" onClick="disp('./profile_data.html')"/>
          </div>
        </div>
        
        <div>
          <p style="margin-left:140px">評価</p>
        </div>
        
      <div>
        <h2>
          <br>
          <p style="margin-left:30px">取引実績</p>
        </h2>
        <div class="box1" style="margin-left:30px">
          <h3>
            <p>過去の取引数：5件</p>
            <div class="div-equal-box">
              <div><a href=""><img class="img3 border" src="./images/test_3.png"></a></div>
              <div><a href=""><img class="img3 border" src="./images/test_4.png"></a></div>
              <div><a href=""><img class="img3 border" src="./images/test_5.png"></a></div>
              <div><a href=""><img class="img3 border" src="./images/test_6.png"></a></div>
              <div><a href=""><img class="img3 border" src="./images/test_7.png"></a></div>
            </div>
          </h3>
        </div>

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
      </section>
     

<!-- サイドコンテンツ -->
<?php require_once('./temp/side.php'); ?>
<!-- /サイドコンテンツ -->

</main>
<!-- /mainコンテンツ -->

<!-- フッター -->
<?php require_once('./temp/footer.php'); ?>
<!-- /フッター -->
