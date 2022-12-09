<!-- ヘッドの全体に関わる共有部分 -->
<?php require_once('./temp/head.php'); ?>
<!-- /ヘッドの全体に関わる共有部分 -->

<!-- ↓↓↓　ここに各画面専用のスタイルのリンクタグを書きます ↓↓↓ -->

<link rel="stylesheet" href="./css/login.css">

<!-- ↑↑↑　/ここに各画面専用のスタイルのリンクタグを書きます　↑↑↑ -->
<!-- ヘッダー -->
</head>
<body>

<?php session_start(); ?>

<header class="header">
      <div class="header-wrapper">
        <div class="header-innder">
          <h1 class="header-logo">
            <a href="./index.php"><img src="./images/logo.png" alt="L" /></a>
          </h1>
          <!-- <form action="./dataretention.php" method="post" class="header-form" name="a_form">
            <div class="select-block">
            <select name="select" class="header-select custom-select-trigger">
              <option value="title">ガチャタイトル</option>
              <option value="character">キャラクター</option>
              <option value="gensaku">原作</option>
              <option value="maker">メーカー</option>
            </select>
            </div>
              <input
                type="text"
                placeholder="何かお探しですか？"
                class="index-text"
                name = "text"
              />
            <span class="header-search-icon">
              <a class="testResult" href="./dataretention.php" onclick="document.a_form.submit();">
              </a>
            </span>
          </form> -->
          <ul class="header-list">
            <!-- <li class="header-item">
              <a href="./news.php" class="news-btn">お知らせ</a>
            </li> -->

            <!--　修正　ログアウト時は非表示に修正 -->
            <?php if(isset($_SESSION['user_id']) == True) { ?> 
              <li class="header-item">
                <div class="icon-wrapper">
                  <a href="./profile.php"><i class="fa-solid fa-circle-user fa-2x"></i></i></a>
                </div>
              </li>
            <?php } ?>
            
            <button class="burger-btn">
                <span class="bar bar_top"></span>
                <span class="bar bar_mid"></span>
                <span class="bar bar_bottom"></span>
            </button>
          </ul>
        </div>
      </div>
    </header>
<!-- /ヘッダー -->

  </head>
  <body>
    <main class="form-content">
        <p class="ttl-text">ログイン</p>

        <!-- 追記 -->
        <?php if ( isset($_GET['data']) ) { ?>
          <h3><font color="red"><center><?php echo 'パスワード もしくは メールアドレス に誤りがあります' ?></center></font></h3>
          <br>
        <?php } ?>

        <form action="./login_db.php" method="post" name="b_form">
          <label for="email" class="label-text">emailを入力してください。</label>
          <div class="email_box">
            <div class="text_inner">
              <input type="email" id="email" class="email_text" name="email"/>
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

            <!--　変更　-->
            <input type="button" value="ログイン" class="login-btn" onclick="document.b_form.submit();"/>

          </div>
          <div class="link-center">
            <a href="password_change.php">パスワードを変更したい、忘れた方はこちら</a><br />
            <a href="register.php">新規会員登録はこちら</a>
          </div>
        </form>
    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/jquery-ui.min.js"></script>
    <script src="./script/script.js"></script>

  </body>
</html>
