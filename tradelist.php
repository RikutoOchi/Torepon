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
  // user_id（出品者のユーザーID）が自分のユーザーIDと同じ、もしくは、other_party_id（申請者のユーザーID）が自分のユーザーIDと同じ
  $sql =  "select * from EXHIBITS LEFT OUTER JOIN TRADES ON EXHIBITS.EXHIBIT_ID = TRADES.EXHIBIT_ID 
           where TRADES.OTHER_PARTY_ID = '" . $_SESSION['user_id'] . "' 
           order by TRADE_START_TIME";
  $data = $exh->getRecord_0($sql);
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

                <?php 
                  require_once __DIR__ . './classes/dbdata.php';
                  $exh = new Dbdata();
                  $sql2 = "select * from EXHIBITS 
                          where USER_ID = '" . $_SESSION['user_id'] . "' order by EXHIBIT_TIME";
                  $data2 = $exh->getRecord_0($sql2);

                  foreach($data2 as $detail2){ ?>

                    <li><a href="./transaction-information.php?id=<?php echo $detail2['EXHIBIT_ID']?>&flag=0"><img src="<?= $detail2['EXHIBIT_PIC_URL']?>" height="100" alt="">
                      <p><?php echo $detail2['EXHIBIT_NAME'] ?></p>

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
                      </div></a>
                    </li>
                  <?php } 
                ?>

                <?php foreach($data as $detail){
                  $exhibit_id = $detail['EXHIBIT_ID'];

                  $exh = new Dbdata();
                  $sql3 = "select * from EXHIBITS LEFT OUTER JOIN TRADES ON EXHIBITS.EXHIBIT_ID = TRADES.EXHIBIT_ID
                           where EXHIBITS.EXHIBIT_ID = '" . $exhibit_id . "' order by TRADE_PROGRESS , TRADE_START_TIME";
                  $data3 = $exh->getRecord_0($sql3);
                  
                  foreach($data3 as $detail3){ ?>
                    <li><a href="./transaction-information.php?id=<?php echo $detail3['EXHIBIT_ID']?>&flag=1"><img src="<?= $detail3['EXHIBIT_PIC_URL']?>" height="100" alt="">
                      <p><?php echo $detail3['EXHIBIT_NAME'] ?></p>

                      <div class="Group">
                        <?php if( $detail3['TRADE_PROGRESS'] == 1 ){ ?>
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
                        <?php } else if( $detail3['TRADE_PROGRESS'] == 2 ) { ?>
                          <div class="Group-Bar"></div>
                          <div class="Group-Item">
                            <div class="Group-Item-CircleOuter Circle Shapeborder">
                              <div class="Group-Item-CircleInner Circle Shapeborder"></div>
                            </div>
                            <p class="Group-Item-Text">申請</p>
                          </div>
                          <div class="Group-Item isActive">
                            <div class="Group-Item-CircleOuter Circle Shapeborder isActive">
                              <div class="Group-Item-CircleInner Circle Shapeborder isActive"></div>
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
                        <?php } else if( $detail3['TRADE_PROGRESS'] == 3 ) { ?>
                          <div class="Group-Bar"></div>
                          <div class="Group-Item">
                            <div class="Group-Item-CircleOuter Circle Shapeborder">
                              <div class="Group-Item-CircleInner Circle Shapeborder"></div>
                            </div>
                            <p class="Group-Item-Text">申請</p>
                          </div>
                          <div class="Group-Item">
                            <div class="Group-Item-CircleOuter Circle Shapeborder">
                              <div class="Group-Item-CircleInner Circle Shapeborder"></div>
                            </div>
                            <p class="Group-Item-Text">承認・拒否</p>
                          </div>
                          <div class="Group-Item isActive">
                            <div class="Group-Item-CircleOuter Circle Shapeborder isActive">
                              <div class="Group-Item-CircleInner Circle Shapeborder isActive"></div>
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
                        <?php } else if( $detail3['TRADE_PROGRESS'] == 4 ) { ?>
                          <div class="Group-Bar"></div>
                          <div class="Group-Item">
                            <div class="Group-Item-CircleOuter Circle Shapeborder">
                              <div class="Group-Item-CircleInner Circle Shapeborder"></div>
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
                          <div class="Group-Item isActive">
                            <div class="Group-Item-CircleOuter Circle Shapeborder isActive">
                              <div class="Group-Item-CircleInner Circle Shapeborder isActive"></div>
                            </div>
                            <p class="Group-Item-Text">発送中</p>
                          </div>
                          <div class="Group-Item">
                            <div class="Group-Item-CircleOuter Circle Shapeborder">
                              <div class="Group-Item-CircleInner Circle Shapeborder"></div>
                            </div>
                            <p class="Group-Item-Text">到着</p>
                          </div>
                        <?php } else if( $detail3['TRADE_PROGRESS'] == 5 ) { ?>
                          <div class="Group-Bar"></div>
                          <div class="Group-Item">
                            <div class="Group-Item-CircleOuter Circle Shapeborder">
                              <div class="Group-Item-CircleInner Circle Shapeborder"></div>
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
                          <div class="Group-Item isActive">
                            <div class="Group-Item-CircleOuter Circle Shapeborder isActive">
                              <div class="Group-Item-CircleInner Circle Shapeborder isActive"></div>
                            </div>
                            <p class="Group-Item-Text">到着</p>
                          </div>
                        <?php } ?>

                      </div></a>
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