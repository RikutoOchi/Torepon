<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/reset.css" />
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="stylesheet" href="./css/news.css">
    <link rel="stylesheet" href="./css/profile.css" />
    <script
      src="https://kit.fontawesome.com/95076eb005.js"
      crossorigin="anonymous"
    ></script>
    <title>home</title>
  </head>
  <body>
    <br>
    <input type="file" name="example" style="margin-left:30px" accept="image/jpeg, image/png" onchange="previewImage(this);">
    <br>
    <p style="margin-left:30px">
      <br>
      Preview:<br>
      <img id="preview" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==">
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
    <br>
    <input type="button" class="btn4" style="margin-left:30px" value="キャンセル" onClick="window.close()"/>
    <input type="button" class="btn3" style="margin-left:520px" value="変更する" href="./index.html"/>
  </body>
</html>