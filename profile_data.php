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
    <title>home</title>
  </head>
  <body>
    <form action="./profile_data_db.php" method="post">
      <br>
      <p style="margin-left:50px">ユ ー ザ ー 名　：<input type="text" name="user_name"></p>
      <br>
      <p style="margin-left:50px">メールアドレス ：<input type="text" name="address"></p>
      <br>
      <p style="margin-left:50px">自己紹介　　　</p>
      <textarea name="appeal" style="margin-left:50px" rows="4" cols="60"></textarea>
      <br>
      <br>
      <br>
      <input type="button" class="btn4" style="margin-left:50px" value="キャンセル" onClick="window.close()"/>
      <input type="button" class="btn3" style="margin-left:190px" value="変更する"  onclick="location.href='./profile_data_db.php'"/>
    </form>
  </body>

</html>