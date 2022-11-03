<!-- ヘッドの全体に関わる共有部分 -->
<?php require_once('./temp/head.php'); ?>
<!-- /ヘッドの全体に関わる共有部分 -->

<!-- ↓↓↓　ここに各画面専用のスタイルのリンクタグを書きます ↓↓↓ -->
<link rel="stylesheet" href="./css/profile.css">
<!-- ↑↑↑　/ここに各画面専用のスタイルのリンクタグを書きます　↑↑↑ -->

<!-- ヘッダー -->
<?php require_once("./temp/header.php"); ?>
<!-- /ヘッダー -->

<main class="main-side-content">
    <section class="main-content">

        <!-- mainコンテンツ -->
        <center><h1><p>プロフィール画像変更</p></h1></center>
        <br><br>

        <center>
          <form method="post" action="./profile_pict_db.php" enctype="multipart/form-data" >

            <input type="file" name="user_icon" style="margin-left:30px" accept="image/jpeg, image/png" onchange="previewImage(this);">
            <br><br>
            <p style="margin-left:30px">
              <br>
              　　Preview<br><br>
              <img id="preview" class="UserIcon" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==">
            </p>
            <script>
              function previewImage(obj)
              {
                var fileReader = new FileReader();
                fileReader.onload = (function() {
                  document.getElementById('preview').src = fileReader.result;
                });
                fileReader.readAsDataURL(obj.files[0]);
              }
            </script>
            <br><br>

                <input type="button" value="　キャンセル　" onclick="location.href='./profile.php'"/>
                　　　　　
                <button type="submit">　変 更 す る　</button>
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