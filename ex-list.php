<!-- ヘッドの全体に関わる共有部分 -->
<?php require_once('./temp/head.php'); ?>
<!-- /ヘッドの全体に関わる共有部分 -->

<!-- ↓↓↓　ここに各画面専用のスタイルのリンクタグを書きます ↓↓↓ -->

<link rel="stylesheet" href="./css/ex-list.css">

<!-- ↑↑↑　/ここに各画面専用のスタイルのリンクタグを書きます　↑↑↑ -->

<!-- ヘッダー -->
<?php require_once("./temp/header.php"); ?>
<!-- /ヘッダー -->


<main class="main-side-content">
  <section class="main-content">  

    <?php
    /* -------------- ソート順の情報 ------------- */
      $sort_id = $_GET['sort_id'];
      $sarch_id = $_GET['sarch_id'];
    /* ------------------------------------------ */

    // 絞り込み条件が設定された場合
    if($sarch_id != 0){

        if($_SESSION["gatya"] == ""){
          $gatya = "%_%";
        } else{
          $gatya = $_SESSION['gatya']; 
        }

        if($_SESSION['kyara'] == ""){
          $kyara = "%_%";
        } else{
          $kyara = $_SESSION['kyara']; 
        }

        if($_SESSION['gensaku'] == ""){
          $gensaku = "%_%";
        } else{
          $gensaku = $_SESSION['gensaku']; 
        }

        if($_SESSION['me-ka-'] == ""){
          $meka = "%_%";
        } else{
          $meka = $_SESSION['me-ka-']; 
        }

        if($_SESSION['nitizi-start'] == ""){
          $nitizi_start = "0000-01-01";
        } else{
          $nitizi_start = $_SESSION['nitizi-start']; 
        }

        if($_SESSION['syurui'] == ""){
          $syurui = "%_%";
        } else{
          $syurui = $_SESSION['syurui']; 
        }

        if($_SESSION['maisu-end'] == ""){
          $maisu_end = "9999999";
        } else{
          $maisu_end = $_SESSION['maisu-end']; 
        }

    } else{
      $gatya = "%_%";
      $kyara = "%_%";
      $gensaku = "%_%";
      $meka = "%_%";
      $nitizi_start = "0000-01-01";
      $syurui = "%_%";
      $maisu_end = "9999999";

      $_SESSION["gatya"] = $gatya;
      $_SESSION["kyara"] = $kyara;
      $_SESSION["gensaku"] = $gensaku;
      $_SESSION["me-ka-"] = $meka;
      $_SESSION["nitizi-start"] = $nitizi_start;
      $_SESSION["syurui"] = $syurui;
      $_SESSION["maisu-end"] = $maisu_end;
    }


    /* ----------------------------------- db接続関連 --------------------------------------- */
      require_once __DIR__ . './classes/dbdata.php';
      $exh = new Dbdata();
    /* -------------------------------------------------------------------------------------- */

      // 新しい順（投稿日時が新しい順）
      if ($sort_id == 0) {
        $sql = "select EXHIBITS.EXHIBIT_PIC_URL,EXHIBITS.EXHIBIT_ID,EXHIBITS.EXHIBIT_NAME 
        from (((EXHIBITS LEFT OUTER JOIN GACHA_TITLES ON EXHIBITS.GACHA_TITLE_ID = GACHA_TITLES.GACHA_TITLE_ID) 
        LEFT OUTER JOIN ORIGINAL_TITLES ON GACHA_TITLES.ORIGINAL_TITLE_ID = ORIGINAL_TITLES.ORIGINAL_TITLE_ID)
        LEFT OUTER JOIN MAKERS ON GACHA_TITLES.MAKER_ID = MAKERS.MAKER_ID)
        where not exists(select TRADE_ID from TRADES where TRADE_ID = EXHIBIT_ID and TRADE_PROGRESS > 2) and
        GACHA_TITLES.GACHA_TITLE_NAME LIKE '" . $gatya . "' and
        EXHIBITS.EXHIBIT_TEXT LIKE '" . $kyara . "' and
        ORIGINAL_TITLES.ORIGINAL_TITLE_NAME LIKE '" . $gensaku . "' and
        MAKERS.MAKER_NAME LIKE '" . $meka . "' and
        EXHIBITS.EXHIBIT_TIME >= '" . $nitizi_start . "' and
        EXHIBITS.TICKET_TYPE_ID LIKE '" . $syurui . "' and
        EXHIBITS.NUMBER_OF_TICKETS <= '" . $maisu_end . "' order by EXHIBIT_TIME desc";
      // 古い順（投稿日時が古い順）
      } elseif($sort_id == 1) {
        $sql = "select EXHIBITS.EXHIBIT_PIC_URL,EXHIBITS.EXHIBIT_ID,EXHIBITS.EXHIBIT_NAME 
        from (((EXHIBITS LEFT OUTER JOIN GACHA_TITLES ON EXHIBITS.GACHA_TITLE_ID = GACHA_TITLES.GACHA_TITLE_ID) 
        LEFT OUTER JOIN ORIGINAL_TITLES ON GACHA_TITLES.ORIGINAL_TITLE_ID = ORIGINAL_TITLES.ORIGINAL_TITLE_ID)
        LEFT OUTER JOIN MAKERS ON GACHA_TITLES.MAKER_ID = MAKERS.MAKER_ID)
        where not exists(select TRADE_ID from TRADES where TRADE_ID = EXHIBIT_ID and TRADE_PROGRESS > 2) and
        GACHA_TITLES.GACHA_TITLE_NAME LIKE '" . $gatya . "' and 
        EXHIBITS.EXHIBIT_TEXT LIKE '" . $kyara . "' and 
        ORIGINAL_TITLES.ORIGINAL_TITLE_NAME LIKE '" . $gensaku . "' and 
        MAKERS.MAKER_NAME LIKE '" . $meka . "' and
        EXHIBITS.EXHIBIT_TIME >= '" . $nitizi_start . "' and 
        EXHIBITS.TICKET_TYPE_ID LIKE '" . $syurui . "' and
        EXHIBITS.NUMBER_OF_TICKETS <= '" . $maisu_end . "' order by EXHIBIT_TIME";
      // 必要チケット枚数　昇順（多い順）
      } elseif($sort_id == 2) {
        $sql = "select EXHIBITS.EXHIBIT_PIC_URL,EXHIBITS.EXHIBIT_ID,EXHIBITS.EXHIBIT_NAME,NUMBER_OF_TICKETS
        from (((EXHIBITS LEFT OUTER JOIN GACHA_TITLES ON EXHIBITS.GACHA_TITLE_ID = GACHA_TITLES.GACHA_TITLE_ID) 
        LEFT OUTER JOIN ORIGINAL_TITLES ON GACHA_TITLES.ORIGINAL_TITLE_ID = ORIGINAL_TITLES.ORIGINAL_TITLE_ID)
        LEFT OUTER JOIN MAKERS ON GACHA_TITLES.MAKER_ID = MAKERS.MAKER_ID)
        where not exists(select TRADE_ID from TRADES where TRADE_ID = EXHIBIT_ID and TRADE_PROGRESS > 2) and
        GACHA_TITLES.GACHA_TITLE_NAME LIKE '" . $gatya . "' and
        EXHIBITS.EXHIBIT_TEXT LIKE '" . $kyara . "' and
        ORIGINAL_TITLES.ORIGINAL_TITLE_NAME LIKE '" . $gensaku . "' and
        MAKERS.MAKER_NAME LIKE '" . $meka . "' and
        EXHIBITS.EXHIBIT_TIME >= '" . $nitizi_start . "' and
        EXHIBITS.TICKET_TYPE_ID LIKE '" . $syurui . "' and
        EXHIBITS.NUMBER_OF_TICKETS <= '" . $maisu_end . "' order by NUMBER_OF_TICKETS";
      // 必要チケット枚数　降順（少ない順）
      } elseif($sort_id == 3) {
        $sql = "select EXHIBITS.EXHIBIT_PIC_URL,EXHIBITS.EXHIBIT_ID,EXHIBITS.EXHIBIT_NAME,NUMBER_OF_TICKETS
        from (((EXHIBITS LEFT OUTER JOIN GACHA_TITLES ON EXHIBITS.GACHA_TITLE_ID = GACHA_TITLES.GACHA_TITLE_ID) 
        LEFT OUTER JOIN ORIGINAL_TITLES ON GACHA_TITLES.ORIGINAL_TITLE_ID = ORIGINAL_TITLES.ORIGINAL_TITLE_ID)
        LEFT OUTER JOIN MAKERS ON GACHA_TITLES.MAKER_ID = MAKERS.MAKER_ID)
        where not exists(select TRADE_ID from TRADES where TRADE_ID = EXHIBIT_ID and TRADE_PROGRESS > 2) and
        GACHA_TITLES.GACHA_TITLE_NAME LIKE '" . $gatya . "' and
        EXHIBITS.EXHIBIT_TEXT LIKE '" . $kyara . "' and
        ORIGINAL_TITLES.ORIGINAL_TITLE_NAME LIKE '" . $gensaku . "' and
        MAKERS.MAKER_NAME LIKE '" . $meka . "' and
        EXHIBITS.EXHIBIT_TIME >= '" . $nitizi_start . "' and
        EXHIBITS.TICKET_TYPE_ID LIKE '" . $syurui . "' and
        EXHIBITS.NUMBER_OF_TICKETS <= '" . $maisu_end . "' order by NUMBER_OF_TICKETS desc";
      }

      $data = $exh->getRecord_0($sql);
    ?>

  <!-- mainコンテンツ -->
    <h1>出品リスト</h1><br>

    <div class="search-box"><div class="searchBy-ttl">絞り込み条件</div><button class="disp-search"></button></div>
      <font size="2">

<!------------- セッション（$_SESSION）にデータを格納させるために、data retension.phpへデータを飛ばす ------------>
      <form action="./dataretention2.php?id=0" method="post" name="terms_form">
        <ul class="searchBy-list none">
          <li>ガチャタイトル　:　<input class="searchBy-text" type="text" name="gatya" ></li>
          <li>キャラクター名　:　<input class="searchBy-text" type="text" name="kyara" ></li>
          <li>原　　　　　作　:　<input class="searchBy-text" type="text" name="gensaku" ></li>
          <li>メ　ー　カ　ー　:　<input class="searchBy-text" type="text" name="me-ka-"></li>
          <li>出　品　日　時　:　<input class="searchBy-text mr-none" type="date" name="nitizi-start">～</li>
          <li>チケット種類　　:　<input class="searchBy-text" type="text" name="syurui"></li>
          <li>チケット枚数　　:　～<input class="searchBy-text ml-none" type="text" name="maisu-end">
          <input type="button" value="絞り込む" class="search" onclick="document.terms_form.submit();"/>
        </li>

        </ul>
        
      </form>
<!------------------------------------------------------------------------------------------------------------->

      </font>

    <br><label>並び順</label><br>

    <?php if($sort_id == 0){ ?>
      <input type="button" value="新しい順" class="sort-btn" style="background-color:#87CEFA" onclick="location.href='ex-list.php?sort_id=0&sarch_id=1'"/>
      <input type="button" value="古い順" class="sort-btn" onclick="location.href='ex-list.php?sort_id=1&sarch_id=1'"/>
      <label>　　</label>
      <input type="button" value="チケット数　昇順" class="sort-btn" onclick="location.href='ex-list.php?sort_id=2&sarch_id=1'"/>
      <input type="button" value="チケット数　降順" class="sort-btn" onclick="location.href='ex-list.php?sort_id=3&sarch_id=1'"/>
    <?php } elseif($sort_id == 1){ ?>
      <input type="button" value="新しい順" class="sort-btn" onclick="location.href='ex-list.php?sort_id=0&sarch_id=1'"/>
      <input type="button" value="古い順" class="sort-btn" style="background-color:#87CEFA" onclick="location.href='ex-list.php?sort_id=1&sarch_id=1'"/>
      <label>　　</label>
      <input type="button" value="チケット数　昇順" class="sort-btn" onclick="location.href='ex-list.php?sort_id=2&sarch_id=1'"/>
      <input type="button" value="チケット数　降順" class="sort-btn" onclick="location.href='ex-list.php?sort_id=3&sarch_id=1'"/>
    <?php } elseif($sort_id == 2){ ?>
      <input type="button" value="新しい順" class="sort-btn" onclick="location.href='ex-list.php?sort_id=0&sarch_id=1'"/>
      <input type="button" value="古い順" class="sort-btn" onclick="location.href='ex-list.php?sort_id=1&sarch_id=1'"/>
      <label>　　</label>
      <input type="button" value="チケット数　昇順" class="sort-btn" style="background-color:#87CEFA" onclick="location.href='ex-list.php?sort_id=2&sarch_id=1'"/>
      <input type="button" value="チケット数　降順" class="sort-btn" onclick="location.href='ex-list.php?sort_id=3&sarch_id=1'"/>
    <?php } elseif($sort_id == 3){ ?>
      <input type="button" value="新しい順" class="sort-btn" onclick="location.href='ex-list.php?sort_id=0&sarch_id=1'"/>
      <input type="button" value="古い順" class="sort-btn" onclick="location.href='ex-list.php?sort_id=1&sarch_id=1'"/>
      <label>　　</label>
      <input type="button" value="チケット数　昇順" class="sort-btn" onclick="location.href='ex-list.php?sort_id=2&sarch_id=1'"/>
      <input type="button" value="チケット数　降順" class="sort-btn" style="background-color:#87CEFA" onclick="location.href='ex-list.php?sort_id=3&sarch_id=1'"/>
    <?php } ?>

    <div class="item-list"> 
        <?php foreach($data as $data_part){ ?>
          <div class="responsive">
            <div class="img">
              <a target="_blank" href="./ex-confirm.php?id=<?php echo $data_part['EXHIBIT_ID'] ?>">
                <img src="<?= $data_part['EXHIBIT_PIC_URL'] ?>" />
              </a>
              <div class="desc">
                <center>
                  <?php echo $data_part['EXHIBIT_NAME'] ?>
                  <br>

                  <!-- 交換に必要なチケット数（チケット数）でソートした場合のみ発動 -->
                  <?php
                    if($sort_id == 2 || $sort_id == 3) {
                      echo '必要チケット数：'.$data_part['NUMBER_OF_TICKETS'];
                    } 
                  ?>
                  <!--------------------------------------------------------------->     

                </center>
              </div>
            </div>
          </div>
        <?php } ?>
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