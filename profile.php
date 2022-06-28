<!DOCTYPE html>

<!-- JavaScriptゾーン -->
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
<!-- ---------------- -->

<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/reset.css" />
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="stylesheet" href="./css/profile.css" />
    <script
      src="https://kit.fontawesome.com/95076eb005.js"
      crossorigin="anonymous"
    ></script>

    <title>home</title>
  </head>
  <body>
    <header class="header">
      <div class="header-wrapper">
        <div class="header-innder">
          <h1 class="header-logo">
            <a href="./index.html"><img src="" alt="L" /></a>
          </h1>
          <form action="./" method="post" class="header-form">
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
            />
            <span class="header-search-icon">
              <a class="testResult" href="./SearchResults.html">
                <i class="fa-solid fa-magnifying-glass fa-lg"></i>
                </a>
            </span>
          </form>
          <ul class="header-list">
            <li class="header-item">
              <a href="./news.html" class="news-btn">お知らせ</a>
            </li>
            <li class="header-item">
              <div class="icon-wrapper">
                <a href="./profile.html"><i class="fa-solid fa-circle-user fa-2x"></i></i></a>
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
    <main class="main-side-content">
      <section class="main-content">



        <!-- mainコンテンツ -->
        <?php foreach ($search_item as $data){ ?>

          <div class="boxContainer">
            <div class="box relative" >
              <img class="img" style="margin-left:30px" src="<?php $data['USER_ICON'] ?>">
              <input type="button" class="btn2 absolute" style="margin-left:20px" value="変更する" onClick="disp2('./profile_pict.html')"/>
            </div>
            <div class="box">
              <h3>
                <p style="margin-left:50px">ユ ー ザ ー 名　：　<?php $data['USER_NAME'] ?></p>
                <p style="margin-left:50px" style="margin-top:50px">ユ ー ザ ー I D ：　<?php $data['USER_ID'] ?></p>
                <p style="margin-left:50px" style="margin-top:50px">メールアドレス ：　<?php $data['MAIL_ADDRESS'] ?></p>
                <br>
                <div class="box2" style="margin-left:50px">
                  <?php $data['USER_TEXT'] ?>
                </div>
              </h3>
            </div>
          </div>

          <div class="boxContainer">
            <div class="box">
              <? if($data['USER_ICON'] == 1){ ?>
                <img class="img2" style="margin-left:30px" src="">
              <? } elseif($data['USER_ICON'] == 2) { ?>
                <img class="img2" style="margin-left:30px" src="">
              <? } elseif($data['USER_ICON'] == 3) { ?>
                <img class="img2" style="margin-left:30px" src="">
              <? } elseif($data['USER_ICON'] == 4) { ?>
                <img class="img2" style="margin-left:30px" src="">
              <? } elseif($data['USER_ICON'] == 5) { ?>
                <img class="img2" style="margin-left:30px" src="">
              <? } ?>
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

          <? if($data['USER_TRADE_COUNT'] == 0){ ?>

          <? } else {?>
            <div class="box1" style="margin-left:30px">
              <h3>
                <p>過去の取引数：5件</p>
                <div class="div-equal-box">
                  <? for ($count = 0; $count < $data2['???']; $count++) { ?>
                    <div><a href="ex-confirm.php"><img class="img3 border" src="<? $data2['???'] ?>"></a></div>  <!-- 出品IDを渡す -->
                  <? } ?>
                </div>
              </h3>
            </div>
          <? } ?>

        <!-- /mainコンテンツ -->
        
      </section>
      <aside class="side-content">
        <!-- 広告コンテンツ -->
          <nav class="humburger-nav">
            <ul class="nav-list">
              <li class="nav-item"><a href="./index.html">HOME</a></li>
              <li class="nav-item"><a href="./profile.html">プロフィール</a></li>
              <li class="nav-item"><a href="./ex-list.html">出品リスト</a></li>
              <li class="nav-item"><a href="./fav-list.html">お気に入りリスト</a></li>
              <li class="nav-item"><a href="./check.html">チケット確認</a></li>
              <li class="nav-item"><a href="./login.html">ログイン</a></li>
            </ul>
          </nav>
          <ul class="ad-list">
            <li class="ad-item"><img src="" alt=""></li>
            <li class="ad-item"><img src="" alt=""></li>
            <li class="ad-item"><img src="" alt=""></li>
          </ul>
        <!-- /広告コンテンツ -->
      </aside>
    </main>

    <footer class="footer">
      <div class="footer-wrapper">
        <div class="footer-inner">
          <p class="copy-text">&copy;PBL2_G班</p>
        </div>
      </div>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="./script/script.js"></script>

  </body>
</html>
