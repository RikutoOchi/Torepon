<!-- ヘッドの全体に関わる共有部分 -->
<?php require_once('./temp/head.php'); ?>
<!-- /ヘッドの全体に関わる共有部分 -->

<!-- ↓↓↓　ここに各画面専用のスタイルのリンクタグを書きます ↓↓↓ -->

<link rel="stylesheet" href="./css/ex-list.css">

<!-- ↑↑↑　/ここに各画面専用のスタイルのリンクタグを書きます　↑↑↑ -->

<!-- ヘッダー -->
<?php require_once("./temp/header.php"); ?>
<!-- /ヘッダー -->

<?php

/* -------------- ソート順の情報 ------------- */
  $sort_id = $_GET['sort_id'];
/* ------------------------------------------ */


/* ---------------------------------- $_SESSIONの各情報 --------------------------------- */
  $gatya = $_SESSION['gatya'];                // ガチャタイトル
  $kyara = $_SESSION['kyara'];                // キャラクター名
  $gensaku = $_SESSION['gensaku'];            // 原作
  $meka = $_SESSION['me-ka-'];                // メーカー
  $nitizi_start = $_SESSION['nitizi-start'];  // 出品日時（下限）
  $nitizi_end = $_SESSION['nitizi-end'];      // 出品日時（上限）
  $syurui = $_SESSION['syurui'];              // チケットの種類
  $maisu_start = $_SESSION['maisu-start'];    // 交換に必要なチケットの枚数（下限）
  $maisu_end = $_SESSION['maisu-end'];        // 交換に必要なチケットの枚数（上限）
/* ------------------------------------------------------------------------------------- */


/* ----------------------------------- db接続関連 --------------------------------------- */
  require_once __DIR__ . './classes/dbdata.php';
  $exh = new Dbdata();
/* -------------------------------------------------------------------------------------- */

  if (isset($sort_id) == false || $sort_id == 0) {
    $sql = "select EXHIBIT_ID,EXHIBIT_PIC_URL,EXHIBIT_NAME from exhibits order by EXHIBIT_TIME";
  } elseif($sort_id == 1) {
    $sql = "select EXHIBIT_ID,EXHIBIT_PIC_URL,EXHIBIT_NAME from exhibits order by EXHIBIT_TIME desc";
  } elseif($sort_id == 2) {
    $sql = "select EXHIBIT_ID,EXHIBIT_PIC_URL,EXHIBIT_NAME, NUMBER_OF_TICKETS from exhibits order by NUMBER_OF_TICKETS";
  } elseif($sort_id == 3) {
    $sql = "select EXHIBIT_ID,EXHIBIT_PIC_URL,EXHIBIT_NAME, NUMBER_OF_TICKETS from exhibits order by NUMBER_OF_TICKETS desc";
  }

  $data = $exh->getRecord_0($sql);
?>

<main class="main-side-content">
  <section class="main-content">  
  <!-- mainコンテンツ -->
    <h1>出品リスト</h1><br>

    <font size="4">絞り込み条件</font><br>
      <font size="2">

<!------------- セッション（$_SESSION）にデータを格納させるために、data retension.phpへデータを飛ばす ------------>
      <form action="./data retension2.php" method="post" name="terms_form">
        　ガチャタイトル：<input type="text" name="gatya"><br>
        　キャラクター名：<input type="text" name="kyara"><br>
        　原　　　　　作：<input type="text" name="gensaku"><br>
        　メ　ー　カ　ー：<input type="text" name="me-ka-"><br>
        　出　品　日　時：<input type="date" name="nitizi-start">～<input type="data" name="nitizi-end"><br>
        　チケット種類　：<input type="text" name="syurui"><br>
        　チケット枚数　：<input type="text" name="maisu-start">～<input type="text" name="maisu-end">　
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