<!-- ヘッドの全体に関わる共有部分 -->
<?php require_once('./temp/head.php'); ?>
<!-- /ヘッドの全体に関わる共有部分 -->

<!-- ↓↓↓　ここに各画面専用のスタイルのリンクタグを書きます ↓↓↓ -->

<link rel="stylesheet" href="./css/ex-list.css">

<!-- ↑↑↑　/ここに各画面専用のスタイルのリンクタグを書きます　↑↑↑ -->

<!-- ヘッダー -->
<?php require_once("./temp/header.php"); ?>
<!-- /ヘッダー -->

check.phpの理解
<?php
  require_once __DIR__ . './classes/dbdata.php';
  // Dbdataオブジェクトを生成する
  $exh = new Dbdata();
  // ガチャタイトルを取り出す
  $exhibit_gacha=$exh->getRecord('gacha_titles','GACHA_TITLE_ID',1);
  // $exhibit_gacha = $exh->getRecords('gacha_titles','USER_ID',$exhibit['GACHA_TITLE_ID']);
  // foreach($exhibit_gacha as $data_part){
  //   $gc_name=$data_part['GACHA_TITLE_ID'];
  // }
  $now=new Dbdata();
  //$exhibit_user = $now->getRecord('users','USER_ID',$exhibit['USER_ID']);
  //$now('SELECT COUNT(EXHIBIT_ID) FROM exhibits WHERE USER_ID='1')
  //$time=new Dbdata();
  //$pdo->query('select * FROM exhibits') as $time
?>
<main class="main-side-content">
  <section class="main-content">
    <div>

      <label>トレード履歴:</label>
      <a href = "./ticket-confirm.php">詳細</a><br><br><br>
      
      <font size="5">チケット枚数</font>
      <table border="1">
        <tr bgcolor="#87cefa">
          <th>チケット名</th>
          <th>枚数</th>
          <th>利用日時</th>
        </tr>
        <tr>
          <th><?= $exhibit_gacha['GACHA_TITLE_NAME'] ?>用チケット</th>
          <th>&nbsp;</th>
          <th>htmlspecialchars($time['EXHIBIT_TIME'])</th>
        </tr>
        <tr>
          <th>&nbsp;</th>
          <th>&nbsp;</th>
          <th>&nbsp;</th>
        </tr> 
        <tr>
          <th>&nbsp;</th>
          <th>&nbsp;</th>
          <th>&nbsp;</th>
        </tr> 
        <tr>
          <th>&nbsp;</th>
          <th>&nbsp;</th>
          <th>&nbsp;</th>
        </tr>
        <tr>
          <th>&nbsp;</th>
          <th>&nbsp;</th>
          <th>&nbsp;</th>
        </tr>
        <tr>
          <th>&nbsp;</th>
          <th>&nbsp;</th>
          <th>&nbsp;</th>
        </tr>
        

      </table>
    </div>
  </section>
  <!-- サイドコンテンツ -->
     <?php require_once('./temp/side.php'); ?>
  <!-- /サイドコンテンツ -->

</main>
<!-- /mainコンテンツ -->
ex-listの理解
<?php
  $sort_id = $_GET['sort_id'];
  echo $sort_id;
  require_once __DIR__ . './classes/dbdata.php';
  $exh = new Dbdata();

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
    <h1>出品リスト</h1>

    <br><label>並び順</label><br>

    <?php if($sort_id == 0){ ?>
      <input type="button" value="新しい順" class="sort-btn" style="background-color:#87CEFA" onclick="location.href='ex-list（db対応版）.php?sort_id=0'"/>
      <input type="button" value="古い順" class="sort-btn" onclick="location.href='ex-list（db対応版）.php?sort_id=1'"/>
      <label>　　</label>
      <input type="button" value="チケット数　昇順" class="sort-btn" onclick="location.href='ex-list（db対応版）.php?sort_id=2'"/>
      <input type="button" value="チケット数　降順" class="sort-btn" onclick="location.href='ex-list（db対応版）.php?sort_id=3'"/>
    <?php } elseif($sort_id == 1){ ?>
      <input type="button" value="新しい順" class="sort-btn" onclick="location.href='ex-list（db対応版）.php?sort_id=0'"/>
      <input type="button" value="古い順" class="sort-btn" style="background-color:#87CEFA" onclick="location.href='ex-list（db対応版）.php?sort_id=1'"/>
      <label>　　</label>
      <input type="button" value="チケット数　昇順" class="sort-btn" onclick="location.href='ex-list（db対応版）.php?sort_id=2'"/>
      <input type="button" value="チケット数　降順" class="sort-btn" onclick="location.href='ex-list（db対応版）.php?sort_id=3'"/>
    <?php } elseif($sort_id == 2){ ?>
      <input type="button" value="新しい順" class="sort-btn" onclick="location.href='ex-list（db対応版）.php?sort_id=0'"/>
      <input type="button" value="古い順" class="sort-btn" onclick="location.href='ex-list（db対応版）.php?sort_id=1'"/>
      <label>　　</label>
      <input type="button" value="チケット数　昇順" class="sort-btn" style="background-color:#87CEFA" onclick="location.href='ex-list（db対応版）.php?sort_id=2'"/>
      <input type="button" value="チケット数　降順" class="sort-btn" onclick="location.href='ex-list（db対応版）.php?sort_id=3'"/>
    <?php } elseif($sort_id == 3){ ?>
      <input type="button" value="新しい順" class="sort-btn" onclick="location.href='ex-list（db対応版）.php?sort_id=0'"/>
      <input type="button" value="古い順" class="sort-btn" onclick="location.href='ex-list（db対応版）.php?sort_id=1'"/>
      <label>　　</label>
      <input type="button" value="チケット数　昇順" class="sort-btn" onclick="location.href='ex-list（db対応版）.php?sort_id=2'"/>
      <input type="button" value="チケット数　降順" class="sort-btn" style="background-color:#87CEFA" onclick="location.href='ex-list（db対応版）.php?sort_id=3'"/>
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

classes/check.phpの理解
<?php
  require_once __DIR__ . '/dbdata.php';

  // チケットの使用・入手履歴取得
  class Check_chicket_data extends DbData{
     public function getRecord_check_chicket_data ($value) {
        //SQL文を定義する
        $sql = "select trades.TRADE_FINISH_TIME,exhibits.NUMBER_OF_TICKETS,gacha_titles.GACHA_TITLE_NAME,tickets.USER_ID
                from ((((( tickets left outer join ticket_types on tickets.TICKET_TYPE_ID = ticket_types.TICKET_TYPE_ID) 
                left outer join ticket_trades on tickets.TICKET_ID = ticket_trades.TICKET_ID)
                left outer join trades on ticket_trades.TRADE_ID = trades.TRADE_ID)
                left outer join exhibits on trades.TRADE_ID = exhibits.EXHIBIT_ID)
                left outer join gacha_titles on ticket_types.GACHA_TITLE_ID = gacha_titles.GACHA_TITLE_ID)
                where tickets.USER_ID = ? or trades.USER_ID = ?
                order by trades.TRADE_FINISH_TIME";
        //実行する
        $stmt = $this->query($sql, [$value,$value]);
        //結果セットを取り出す
        $records = $stmt->fetchAll( );
        //結果セットを戻り値として返す
        return  $records;
    }
  }

  // 自分が持っているチケットの種類一覧を取得
  class Check_keep_chicket_type_data extends DbData{
    public function getRecord_check_keep_chicket_type_data ($value) {
       $sql = "select gacha_titles.GACHA_TITLE_ID
               from ((((( tickets left outer join ticket_types on tickets.TICKET_TYPE_ID = ticket_types.TICKET_TYPE_ID) 
               left outer join ticket_trades on tickets.TICKET_ID = ticket_trades.TICKET_ID)
               left outer join trades on ticket_trades.TRADE_ID = trades.TRADE_ID)
               left outer join exhibits on trades.TRADE_ID = exhibits.EXHIBIT_ID)
               left outer join gacha_titles on ticket_types.GACHA_TITLE_ID = gacha_titles.GACHA_TITLE_ID)
               where tickets.USER_ID = ?";
       $stmt = $this->query($sql, [$value]);
       $records = $stmt->fetchAll( );
       return  $records;
   }
 }
  class Check_keep_chicket_data extends DbData{
    public function getRecord_check_keep_chicket_data ($user_id,$value) {
          //SQL文を定義する
          $sql = "select gacha_titles.GACHA_TITLE_NAME //gacha_titlesテーブルのGACHA_TITLE_NAMEを指定
                ,sum(exhibits.NUMBER_OF_TICKETS) as NUMBER_OF_TICKETS  //指定したGACHA_TITLE_NAMEの合計をチケット数として扱う。
              from ((((
                ①(tickets left outer join ticket_types on tickets.TICKET_TYPE_ID = ticket_types.TICKET_TYPE_ID) 
                //ticketsテーブルにticket_typesテーブルを左外部結合する。
                  その際、指定条件としてticketsテーブルのTICKET_TYPE_IDとticket_typesテーブルのTICKET_TYPE_IDが一致するものを指定する。
                ②left outer join ticket_trades on tickets.TICKET_ID = ticket_trades.TICKET_ID)
                //①のテーブルにticket_tradesテーブルを左外部結合する。
                  その際、指定条件としてticketsテーブルのTICKET_IDとticket_tradesテーブルのTICKET_IDが一致する物を指定する。
                ③left outer join trades on ticket_trades.TRADE_ID = trades.TRADE_ID)
                //②のテーブルにtradesテーブルを左外部結合する。
                  その際、指定条件としてticket_tradesテーブルのTRADE_IDとtradesテーブルのTRADE_IDが一致する物を指定する。
                ④left outer join exhibits on trades.TRADE_ID = exhibits.EXHIBIT_ID)
                //③のテーブルにexhibitsテーブルを左外部結合する。
                  その際、指定条件としてtradesテーブルのTRADE_IDとexhibitsテーブルのEXHIBIT_IDが一致する物を指定する。
                ⑤left outer join gacha_titles on ticket_types.GACHA_TITLE_ID = gacha_titles.GACHA_TITLE_ID)
                //④のテーブルにgacha_titlesテーブルを左外部結合する。
                  その際、指定条件としてticket_typesテーブルのGACHA_TITLE_IDとgacha_titlesテーブルのGACHA_TITLE_IDが一致する物を指定する。
                  ticketsテーブルを基準としてticket_types,ticket_trades,trades,exhibits,gacha_titlesテーブルを結合し、一致するものを統合しながら一つのテーブルとする。
              where tickets.USER_ID = ? and gacha_titles.GACHA_TITLE_ID = ?";
              //ticketsテーブルのUSER_IDとgacha_titlesテーブルのGACHA_TITLE_IDが一致するものを指定
          //実行する
          $stmt = $this->query($sql, [$user_id,$value]);
          //結果セットを取り出す
          $records = $stmt->fetchAll( );
          //結果セットを戻り値として返す
          return  $records;
       }
     }
?>