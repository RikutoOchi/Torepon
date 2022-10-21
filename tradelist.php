<!-- ヘッドの全体に関わる共有部分 -->
<?php require_once('./temp/head.php'); ?>
<!-- /ヘッドの全体に関わる共有部分 -->

<!-- ↓↓↓　ここに各画面専用のスタイルのリンクタグを書きます ↓↓↓ -->

<link rel="stylesheet" href="./css/tradelist.css">

<!-- ↑↑↑　/ここに各画面専用のスタイルのリンクタグを書きます　↑↑↑ -->

<!-- ヘッダー -->
<?php require_once("./temp/header.php"); ?>
<!-- /ヘッダー -->

<?php
  require_once __DIR__ . './classes/dbdata.php';

  $exh = new Dbdata();
  // other_party_id（申請者のユーザーID）が自分のユーザーIDと同じ
  $get_exhibit_id_sql =  "select * from EXHIBITS LEFT OUTER JOIN TRADES ON EXHIBITS.EXHIBIT_ID = TRADES.USER_ID 
                          where TRADES.OTHER_PARTY_ID = '" . $_SESSION['user_id'] . "' 
                          order by TRADE_START_TIME";
  $get_exhibit_id = $exh->getRecord_0($get_exhibit_id_sql);
?>

    <main class="main-side-content">
      <section class="main-content">

        <!-- mainコンテンツ -->
        <div class="maincol">

          <div class="maincol-container">

            <div class="news">

              <h2>進行中のトレードリスト</h2>

              <ul class="news-contents">
                <!-- ここのAタグに詳細画面のURL貼り付け -->

                <!-------------------- 自分が出品した物の状況の情報取得・表示 ------------------->
                <?php

                  // DB接続・情報の取得
                  $exh = new Dbdata();
                  $myself_sql = "select * from EXHIBITS 
                          where USER_ID = '" . $_SESSION['user_id'] . "' order by EXHIBIT_TIME";
                  $myself_info = $exh->getRecord_0($myself_sql);

                  foreach($myself_info as $myself_info_detail){ ?>

                    <li>
                      <a href="./transaction-information.php?id=<?php echo $myself_info_detail['EXHIBIT_ID']?>&flag=0"><img src="<?= $myself_info_detail['EXHIBIT_PIC_URL']?>" height="100" alt=""></a>
                      
                      <p><?php echo $myself_info_detail['EXHIBIT_NAME'] ?></p>

                      <div class="Group">

                        <div class="Group-Bar"></div>

                        <div class="Group-Item isActive">
                          <div class="Group-Item-CircleOuter Circle Shapeborder isActive">
                            <div class="Group-Item-CircleInner Circle Shapeborder isActive"></div>
                          </div>
                          <p class="Group-Item-Text">申請</p>
                        </div>

                        <div class="Group-Item">
                          <div class="Group-Item-CircleOuter Circle Shapeborder">
                            <div class="Group-Item-CircleInner Circle Shapeborder"></div>
                          </div>
                          <p class="Group-Item-Text">承認・拒否</p>
                        </div>

                        <div class="Group-Item">
                          <div class="Group-Item-CircleOuter Circle Shapeborder">
                            <div class="Group-Item-CircleInner Circle Shapeborder"></div>
                          </div>
                          <p class="Group-Item-Text">交渉中</p>
                        </div>

                        <div class="Group-Item">
                          <div class="Group-Item-CircleOuter Circle Shapeborder">
                            <div class="Group-Item-CircleInner Circle Shapeborder"></div>
                          </div>
                          <p class="Group-Item-Text">発送中</p>
                        </div>

                        <div class="Group-Item">
                          <div class="Group-Item-CircleOuter Circle Shapeborder">
                            <div class="Group-Item-CircleInner Circle Shapeborder"></div>
                          </div>
                          <p class="Group-Item-Text">到着</p>
                        </div>

                      </div>

                    </li>

                  <?php } 
                ?>
                <!------------------------------------------------------------------------------->

                <?php foreach($get_exhibit_id as $get_exhibit_id_detail){

                  // exhibit_id（出品ID）
                  $exhibit_id = $get_exhibit_id_detail['EXHIBIT_ID'];
                  
                  // DB接続・SQL文
                  $exh = new Dbdata();
                  $applicant_sql = "select * from EXHIBITS LEFT OUTER JOIN TRADES ON EXHIBITS.EXHIBIT_ID = TRADES.USER_ID
                                    where EXHIBITS.EXHIBIT_ID = '" . $exhibit_id . "' order by TRADE_PROGRESS , TRADE_START_TIME";
                  $applicant_info = $exh->getRecord_0($applicant_sql);
                  
                  foreach($applicant_info as $applicant_info_detail){ ?>

                    <li>

                      <a href="./transaction-information.php?id=<?php echo $applicant_info_detail['EXHIBIT_ID']?>&flag=1"><img src="<?= $applicant_info_detail['EXHIBIT_PIC_URL']?>" height="100" alt=""></a>
                      
                      <p><?php echo $applicant_info_detail['EXHIBIT_NAME'] ?></p>

                      <div class="Group">

                        <div class="Group-Bar"></div>

                        <?php if( $applicant_info_detail['TRADE_PROGRESS'] == 1 ){ ?>
                          <div class="Group-Item isActive">
                            <div class="Group-Item-CircleOuter Circle Shapeborder isActive">
                              <div class="Group-Item-CircleInner Circle Shapeborder isActive"></div>
                            </div>
                        <?php } else { ?>
                          <div class="Group-Item">
                            <div class="Group-Item-CircleOuter Circle Shapeborder">
                              <div class="Group-Item-CircleInner Circle Shapeborder"></div>
                            </div>
                        <?php } ?>
                              <p class="Group-Item-Text">申請</p>
                          </div>


                        <?php if( $applicant_info_detail['TRADE_PROGRESS'] == 2 ){ ?>
                          <div class="Group-Item isActive">
                            <div class="Group-Item-CircleOuter Circle Shapeborder isActive">
                              <div class="Group-Item-CircleInner Circle Shapeborder isActive"></div>
                            </div>
                        <?php } else { ?>
                          <div class="Group-Item">
                            <div class="Group-Item-CircleOuter Circle Shapeborder">
                              <div class="Group-Item-CircleInner Circle Shapeborder"></div>
                            </div>
                        <?php } ?>
                            <p class="Group-Item-Text">承認・拒否</p>
                          </div>
                              
                        <?php if( $applicant_info_detail['TRADE_PROGRESS'] == 3 ){ ?>
                          <div class="Group-Item isActive">
                            <div class="Group-Item-CircleOuter Circle Shapeborder isActive">
                              <div class="Group-Item-CircleInner Circle Shapeborder isActive"></div>
                            </div>
                        <?php } else{ ?>
                          <div class="Group-Item">
                            <div class="Group-Item-CircleOuter Circle Shapeborder">
                              <div class="Group-Item-CircleInner Circle Shapeborder"></div>
                            </div>
                        <?php } ?>
                            <p class="Group-Item-Text">交渉中/p>
                          </div>

                        <?php if( $applicant_info_detail['TRADE_PROGRESS'] == 4 ){ ?>
                          <div class="Group-Item isActive">
                            <div class="Group-Item-CircleOuter Circle Shapeborder isActive">
                              <div class="Group-Item-CircleInner Circle Shapeborder isActive"></div>
                            </div>
                        <?php } else { ?>
                          <div class="Group-Item">
                            <div class="Group-Item-CircleOuter Circle Shapeborder">
                              <div class="Group-Item-CircleInner Circle Shapeborder"></div>
                            </div>
                        <?php } ?>
                            <p class="Group-Item-Text">発送中</p>
                          </div>

                        <?php if( $applicant_info_detail['TRADE_PROGRESS'] == 5 ){ ?>
                          <div class="Group-Item isActive">
                            <div class="Group-Item-CircleOuter Circle Shapeborder isActive">
                              <div class="Group-Item-CircleInner Circle Shapeborder isActive"></div>
                            </div>
                        <?php } else { ?>
                          <div class="Group-Item">
                            <div class="Group-Item-CircleOuter Circle Shapeborder">
                              <div class="Group-Item-CircleInner Circle Shapeborder"></div>
                            </div>
                        <?php } ?>
                            <p class="Group-Item-Text">到着</p>
                          </div>

                      </div>

                    </li>

                  <?php } ?>
                <?php } ?>
                  
              </ul>

            </div>

          </div>

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