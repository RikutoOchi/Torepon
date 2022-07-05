
</head>
<body>

<?php session_start(); ?>

<header class="header">
      <div class="header-wrapper">
        <div class="header-innder">
          <h1 class="header-logo">
            <a href="./index.php"><img src="" alt="L" /></a>
          </h1>
          <form action="./SearchResults.php" method="post" class="header-form" name="a_form">
            <select name="select" class="header-select">
              <option value="title">ガチャタイトル</option>
              <option value="character">キャラクター</option>
              <option value="gensaku">原作</option>
              <option value="maker">メーカー</option>
            </select>
              <input
                type="text"
                placeholder="何かお探しですか？"
                class="index-text"
                name = "text"
              />
            <span class="header-search-icon">
              <a class="testResult" href="./SearchResults.php" onclick="document.a_form.submit();">
              </a>
            </span>
          </form>
          <ul class="header-list">
            <li class="header-item">
              <a href="./news.php" class="news-btn">お知らせ</a>
            </li>
            <li class="header-item">
              <div class="icon-wrapper">
                <a href="./profile.php"><i class="fa-solid fa-circle-user fa-2x"></i></i></a>
              </div>
            </li>
            <button class="burger-btn">
                <span class="bar bar_top"></span>
                <span class="bar bar_mid"></span>
                <span class="bar bar_bottom"></span>
            </button>
          </ul>
        </div>
      </div>
    </header>