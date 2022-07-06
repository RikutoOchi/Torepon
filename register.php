<!-- ヘッドの全体に関わる共有部分 -->
<?php require_once('./temp/head.php'); ?>
<!-- /ヘッドの全体に関わる共有部分 -->

<!-- ↓↓↓　ここに各画面専用のスタイルのリンクタグを書きます ↓↓↓ -->

<link rel="stylesheet" href="./css/login.css">

<!-- ↑↑↑　/ここに各画面専用のスタイルのリンクタグを書きます　↑↑↑ -->
</head>
<body>

    <main class="form-content">
      <p class="ttl-text">新規会員登録</p>

      <!-- エラー内容の表示 -->
      <?php

        // 試行2回目～
        if ( isset($_GET['mail']) ) {
          $mail = $_GET['mail'];        // メールアドレス
          // $length = $_GET['length'];    // パスワードの長さ
          // $spel = $_GET['spel'];        // パスワードに使われている文字
        }

        if($mail == 10){

          // ↓要修正
          echo 'メールアドレスが正しくありません';    // 有効なメールアドレスでない旨のメッセージを表示
          
        } elseif ($mail == 20) {

          // ↓要修正
          echo 'メールアドレスは既に登録されています';    // メールアドレスが既に登録されている旨のメッセージを表示
          
        }

        /*
        if($length == False){

          echo 'パスワードは6文字以上12文字以内';    // 有効なパスワードの長さでない旨のメッセージを表示

        }
        */

      ?>

      <form action="./register_db.php" method="post" name="c_form">
        <label for="email" class="label-text">emailを入力してください。</label>
        <div class="email_box">
          <div class="text_inner">
            <input type="email" id="email" class="email_text" name="email" />
            <div class="email_string">emailを入力</div>
          </div>
        </div>
        <label for="password" class="label-text">
          パスワードを入力してください</label
        >
        <div class="password_box">
          <div class="text_inner">
            <input type="password" id="password" class="password_text" name="password"/>
            <div class="password_string">passwordを入力</div>
          </div>
        </div>
        <div class="login-btn-center">
          <input type="button" value="登録完了" class="login-btn" onclick="document.c_form.submit();"/>
        </div>
      </form>
      </main>
      </body>
</html>
<!-- 
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>新規ユーザー登録</title>
	<link rel="stylesheet" href="login.css">
</head>
<body>
<div id="main">
<h2>新規ユーザー登録</h2>
<hr>
<p>ご希望のユーザーID、パスワード、お名前を入力してください。</p>
<form method="POST" action="register.php">
<table id="mainTable">
	<tr>
		<th class="right-align">ユーザーID:</th>
		<td class="left-align"><input type="text" name="input_id"></td>
	</tr>
	<tr>
		<th class="right-align">パスワード:</th>
		<td class="left-align"><input type="password" name="input_pass"></td>
	</tr>
	<tr>
		<th class="right-align">お名前:</th>
		<td class="left-align"><input type="text" name="input_name"></td>
	</tr>
	<tr>
		<th class="right-align">&nbsp;</th>
		<td class="left-align"><input type="submit" value="登録する"></td>
	</tr>
</table>
</form>
<hr>
</div>
</body>
</html>
-->

