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


    if($sarch_id != 0){
      /* ---------------------------------- $_SESSIONの各情報 --------------------------------- */

        $gatya_session = $_SESSION["gatya"];
        $kyara_session = $_SESSION["kyara"];
        $gensaku_session = $_SESSION["gensaku"];
        $meka_session = $_SESSION["me-ka-"];
        $nitizi_start_session = $_SESSION["nitizi-start"];
        $syurui_session = $_SESSION["syurui"];
        $maisu_end_session = $_SESSION["maisu-end"];
  
        if($gatya_session == ""){
          $gatya = "%_%";
        } else{
          $gatya = $_SESSION['gatya']; 
        };
        if($kyara_session == ""){
          $kyara = "%_%";
        } else{
          $kyara = $_SESSION['kyara']; 
        };

        if($gensaku_session == ""){
          $gensaku = "%_%";
        } else{
          $gensaku = $_SESSION['gensaku']; 
        };
        if($meka_session == ""){
          $meka = "%_%";
        } else{
          $meka = $_SESSION['me-ka-']; 
        };
        if($nitizi_start_session == ""){
          $nitizi_start = "0000-01-01";
        } else{
          $nitizi_start = $_SESSION['nitizi-start']; 
        };
        if($syurui_session == ""){
          $syurui = "%_%";
        } else{
          $syurui = $_SESSION['syurui']; 
        };
        if($maisu_end_session == ""){
          $maisu_end = "9999999";
        } else{
          $maisu_end = $_SESSION['maisu-end']; 
        };
      /* ------------------------------------------------------------------------------------- */
    } else{
      $gatya = "%_%";
      $kyara = "%_%";
      $gensaku = "%_%";
      $meka = "%_%";
      $nitizi_start = "0000-01-01";
      $syurui = "%_%";
      $maisu_end = "9999999";
    }


    /* ----------------------------------- db接続関連 --------------------------------------- */
      require_once __DIR__ . './classes/dbdata.php';
      $exh = new Dbdata();
    /* -------------------------------------------------------------------------------------- */

      if ($sort_id == 0) {
        $sql = "select EXHIBITS.EXHIBIT_PIC_URL,EXHIBITS.EXHIBIT_ID,EXHIBITS.EXHIBIT_NAME 
        from (((EXHIBITS LEFT OUTER JOIN GACHA_TITLES ON EXHIBITS.GACHA_TITLE_ID = GACHA_TITLES.GACHA_TITLE_ID) 
        LEFT OUTER JOIN ORIGINAL_TITLES ON GACHA_TITLES.ORIGINAL_TITLE_ID = ORIGINAL_TITLES.ORIGINAL_TITLE_ID)
        LEFT OUTER JOIN MAKERS ON GACHA_TITLES.MAKER_ID = MAKERS.MAKER_ID)
        where GACHA_TITLES.GACHA_TITLE_NAME LIKE '" . $gatya . "' and
        EXHIBITS.EXHIBIT_TEXT LIKE '" . $kyara . "' and
        ORIGINAL_TITLES.ORIGINAL_TITLE_NAME LIKE '" . $gensaku . "' and
        MAKERS.MAKER_NAME LIKE '" . $meka . "' and
        EXHIBITS.EXHIBIT_TIME >= '" . $nitizi_start . "' and
        EXHIBITS.TICKET_TYPE_ID LIKE '" . $syurui . "' and
        EXHIBITS.NUMBER_OF_TICKETS <= '" . $maisu_end . "' order by EXHIBIT_TIME";
        //$sql = "select EXHIBIT_ID,EXHIBIT_PIC_URL,EXHIBIT_NAME from exhibits order by EXHIBIT_TIME";
      } elseif($sort_id == 1) {
        $sql = "select EXHIBITS.EXHIBIT_PIC_URL,EXHIBITS.EXHIBIT_ID,EXHIBITS.EXHIBIT_NAME 
        from (((EXHIBITS LEFT OUTER JOIN GACHA_TITLES ON EXHIBITS.GACHA_TITLE_ID = GACHA_TITLES.GACHA_TITLE_ID) 
        LEFT OUTER JOIN ORIGINAL_TITLES ON GACHA_TITLES.ORIGINAL_TITLE_ID = ORIGINAL_TITLES.ORIGINAL_TITLE_ID)
        LEFT OUTER JOIN MAKERS ON GACHA_TITLES.MAKER_ID = MAKERS.MAKER_ID)
        where GACHA_TITLES.GACHA_TITLES LIKE '" . $gatya . "' 
        EXHIBITS.EXHIBIT_TEXT LIKE '" . $kyara . "' 
        ORIGINAL_TITLES.ORIGINAL_TITLE_NAME LIKE '" . $gensaku . "' 
        MAKERS.MAKER_NAME LIKE '" . $meka . "' 
        EXHIBITS.EXHIBIT_TIME >= '" . $nitizi_start . "' 
        EXHIBITS.TICKET_TYPE_ID LIKE '" . $syurui . "' 
        EXHIBITS.NUMBER_OF_TICKETS <= '" . $maisu_end . "' order by EXHIBIT_TIME desc";
        // $sql = "select EXHIBIT_ID,EXHIBIT_PIC_URL,EXHIBIT_NAME from exhibits order by EXHIBIT_TIME desc";
      } elseif($sort_id == 2) {
        $sql = "select EXHIBITS.EXHIBIT_PIC_URL,EXHIBITS.EXHIBIT_ID,EXHIBITS.EXHIBIT_NAME 
        from (((EXHIBITS LEFT OUTER JOIN GACHA_TITLES ON EXHIBITS.GACHA_TITLE_ID = GACHA_TITLES.GACHA_TITLE_ID) 
        LEFT OUTER JOIN ORIGINAL_TITLES ON GACHA_TITLES.ORIGINAL_TITLE_ID = ORIGINAL_TITLES.ORIGINAL_TITLE_ID)
        LEFT OUTER JOIN MAKERS ON GACHA_TITLES.MAKER_ID = MAKERS.MAKER_ID)
        where GACHA_TITLES.GACHA_TITLES LIKE '" . $gatya . "' 
        EXHIBITS.EXHIBIT_TEXT LIKE '" . $kyara . "' 
        ORIGINAL_TITLES.ORIGINAL_TITLE_NAME LIKE '" . $gensaku . "' 
        MAKERS.MAKER_NAME LIKE '" . $meka . "' 
        EXHIBITS.EXHIBIT_TIME >= '" . $nitizi_start . "' 
        EXHIBITS.TICKET_TYPE_ID LIKE '" . $syurui . "' 
        EXHIBITS.NUMBER_OF_TICKETS <= '" . $maisu_end . "' order by NUMBER_OF_TICKETS";
        //$sql = "select EXHIBIT_ID,EXHIBIT_PIC_URL,EXHIBIT_NAME, NUMBER_OF_TICKETS from exhibits order by NUMBER_OF_TICKETS";
      } elseif($sort_id == 3) {
        $sql = "select EXHIBITS.EXHIBIT_PIC_URL,EXHIBITS.EXHIBIT_ID,EXHIBITS.EXHIBIT_NAME 
        from (((EXHIBITS LEFT OUTER JOIN GACHA_TITLES ON EXHIBITS.GACHA_TITLE_ID = GACHA_TITLES.GACHA_TITLE_ID) 
        LEFT OUTER JOIN ORIGINAL_TITLES ON GACHA_TITLES.ORIGINAL_TITLE_ID = ORIGINAL_TITLES.ORIGINAL_TITLE_ID)
        LEFT OUTER JOIN MAKERS ON GACHA_TITLES.MAKER_ID = MAKERS.MAKER_ID)
        where GACHA_TITLES.GACHA_TITLES LIKE '" . $gatya . "' 
        EXHIBITS.EXHIBIT_TEXT LIKE '" . $kyara . "' 
        ORIGINAL_TITLES.ORIGINAL_TITLE_NAME LIKE '" . $gensaku . "' 
        MAKERS.MAKER_NAME LIKE '" . $meka . "' 
        EXHIBITS.EXHIBIT_TIME >= '" . $nitizi_start . "' 
        EXHIBITS.TICKET_TYPE_ID LIKE '" . $syurui . "' 
        EXHIBITS.NUMBER_OF_TICKETS <= '" . $maisu_end . "' order by NUMBER_OF_TICKETS desc";
        //$sql = "select EXHIBIT_ID,EXHIBIT_PIC_URL,EXHIBIT_NAME, NUMBER_OF_TICKETS from exhibits order by NUMBER_OF_TICKETS desc";
      }

      $data = $exh->getRecord_0($sql);
    ?>

  <!-- mainコンテンツ -->
    <h1>出品リスト</h1><br>

    <font size="4">絞り込み条件</font><br>
      <font size="2">

<!------------- セッション（$_SESSION）にデータを格納させるために、data retension.phpへデータを飛ばす ------------>
      <form action="./dataretention2.php?id=0" method="post" name="terms_form">
        　ガチャタイトル　：　　<input type="text" name="gatya"><br>
        　キャラクター名　：　　<input type="text" name="kyara"><br>
        　原　　　　　作　：　　<input type="text" name="gensaku"><br>
        　メ　ー　カ　ー　：　　<input type="text" name="me-ka-"><br>
        　出　品　日　時　：　　<input type="date" name="nitizi-start">～<br>
        　チケット種類　　：　　<input type="text" name="syurui"><br>
        　チケット枚数　　：　～<input type="text" name="maisu-end">　
        <input type="button" value="絞り込む" class="search" onclick="document.terms_form.submit();"/><br><br>
      </form>
<!------------------------------------------------------------------------------------------------------------->

      </font>

    <br><label>並び順</label><br>

    <?php if($sort_id == 0){ ?>
      <input type="button" value="新しい順" class="sort-btn" style="background-color:#87CEFA" onclick="location.href='ex-list.php?sort_id=0'"/>
      <input type="button" value="古い順" class="sort-btn" onclick="location.href='ex-list.php?sort_id=1'"/>
      <label>　　</label>
      <input type="button" value="チケット数　昇順" class="sort-btn" onclick="location.href='ex-list.php?sort_id=2'"/>
      <input type="button" value="チケット数　降順" class="sort-btn" onclick="location.href='ex-list.php?sort_id=3'"/>
    <?php } elseif($sort_id == 1){ ?>
      <input type="button" value="新しい順" class="sort-btn" onclick="location.href='ex-list.php?sort_id=0'"/>
      <input type="button" value="古い順" class="sort-btn" style="background-color:#87CEFA" onclick="location.href='ex-list.php?sort_id=1'"/>
      <label>　　</label>
      <input type="button" value="チケット数　昇順" class="sort-btn" onclick="location.href='ex-list.php?sort_id=2'"/>
      <input type="button" value="チケット数　降順" class="sort-btn" onclick="location.href='ex-list.php?sort_id=3'"/>
    <?php } elseif($sort_id == 2){ ?>
      <input type="button" value="新しい順" class="sort-btn" onclick="location.href='ex-list.php?sort_id=0'"/>
      <input type="button" value="古い順" class="sort-btn" onclick="location.href='ex-list.php?sort_id=1'"/>
      <label>　　</label>
      <input type="button" value="チケット数　昇順" class="sort-btn" style="background-color:#87CEFA" onclick="location.href='ex-list.php?sort_id=2'"/>
      <input type="button" value="チケット数　降順" class="sort-btn" onclick="location.href='ex-list.php?sort_id=3'"/>
    <?php } elseif($sort_id == 3){ ?>
      <input type="button" value="新しい順" class="sort-btn" onclick="location.href='ex-listhp?sort_id=0'"/>
      <input type="button" value="古い順" class="sort-btn" onclick="location.href='ex-list.php?sort_id=1'"/>
      <label>　　</label>
      <input type="button" value="チケット数　昇順" class="sort-btn" onclick="location.href='ex-list.php?sort_id=2'"/>
      <input type="button" value="チケット数　降順" class="sort-btn" style="background-color:#87CEFA" onclick="location.href='ex-list.php?sort_id=3'"/>
    <?php } ?>
    <br><br>

    <div class="item-list"> 
        <?php foreach($data as $data_part){ ?>
          <div class="responsive">
            <div class="img">
              <a target="_blank" href="./ex-confirm.php?ident=<?php echo $data_part['EXHIBIT_ID'] ?>">
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