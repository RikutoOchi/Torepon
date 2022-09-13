
<?php if( isset($_GET['data']) ){ ?>

<!-- ★★★　ここのデザイン　★★★ -->
  認証コードが違います。
<br>
  再入力してください。
<!----------------------------------->

<?php } ?>

<!-- ★★★　ここのデザイン　★★★ -->

<form action="./register_db.php" method="post" name="d_form">
    <label for="code" class="label-text">認証コードを入力してください。</label>
    <div class="email_box">
      <div class="text_inner">
        <input type="code" id="code" class="email_text" name="code" />
        <div class="code_string">認証コードを入力</div>
      </div>
    </div>
    <div class="login-btn-center">
      <input type="button" value="次へ" class="login-btn" onclick="document.d_form.submit();"/>
    </div>
    <div class="login-btn-center">
      <input type="button" value="登録し直す" class="login-btn" onclick="location.href='./register.php'"/>
    </div>
</form>

<!------------------------------------->