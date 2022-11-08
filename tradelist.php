<!-- ヘッドの全体に関わる共有部分 -->
<?php require_once('./temp/head.php'); ?>
<!-- /ヘッドの全体に関わる共有部分 -->

<!-- ↓↓↓　ここに各画面専用のスタイルのリンクタグを書きます ↓↓↓ -->

<link rel="stylesheet" href="./css/tradelist.css">
<link rel="stylesheet" href="./css/tradelist_tab.css">

<!-- ↑↑↑　/ここに各画面専用のスタイルのリンクタグを書きます　↑↑↑ -->

<!-- ヘッダー -->
<?php require_once("./temp/header.php"); ?>
<!-- /ヘッダー -->

<!--- DB関連 --->
<?php
  
  require_once __DIR__ . './classes/tradelist.php';
  
  // 自分が申請者になっているものを取得
  $get_id = new Tradelist_exhibit();
  $applicant_info = $get_id->getRecord_tradelist_number_of_transactions($_SESSION['user_id']);

  // 自分が出品したものの詳細情報取得
  $myself = new Tradelist_application();
  $myself_info = $myself->getRecords_order_by($_SESSION['user_id']);
  
?>
<!--- /DB関連 -->

    <main class="main-side-content">
      <section class="main-content">

        <!-- mainコンテンツ -->
        <div class="maincol">
          <div class="maincol-container">
            <div class="news">
              <h2>進行中のトレードリスト</h2>

              <div class="tab-wrap">

                <input id="tab01" type="radio" name="tab" class="tab-switch" checked="checked"><label class="tab-label" for="tab01">取引情報（出品物）</label>
                <div class="tab-content">

                  <ul class="news-contents">
                    <?php foreach($myself_info as $myself_info_detail){ ?>
                      <li>
                        <a href="./transaction-information.php?id=<?php echo $myself_info_detail['EXHIBIT_ID']?>&flag=0"><img src="<?= $myself_info_detail['EXHIBIT_PIC_URL']?>" height="100" alt="">
                        
                        <p><?php echo $myself_info_detail['EXHIBIT_NAME'] ?></p>

                        <div class="Group">

                          <div class="Group-Bar"></div>

                          <?php if( $myself_info_detail['TRADE_PROGRESS'] == 1 or $myself_info_detail['TRADE_PROGRESS'] == ''){ ?>
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

                          <?php if( $myself_info_detail['TRADE_PROGRESS'] == 2 ){ ?>
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
                                  
                          <?php if( $myself_info_detail['TRADE_PROGRESS'] == 3 ){ ?>
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
                              <p class="Group-Item-Text">交渉中</p>
                            </div>

                          <?php if( $myself_info_detail['TRADE_PROGRESS'] == 4 ){ ?>
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

                          <?php if( $myself_info_detail['TRADE_PROGRESS'] == 5 ){ ?>
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
                      
                      </li></a>
                    <?php } ?>
                  </ul>
                </div>

                <input id="tab02" type="radio" name="tab" class="tab-switch"><label class="tab-label" for="tab02">取引状況（申請物）</label>
                <div class="tab-content">

                  <ul class="news-contents">

                      <?php foreach($applicant_info as $applicant_info_detail){ ?>

                        <li>

                          <a href="./transaction-information.php?id=<?php echo $applicant_info_detail['EXHIBIT_ID']?>&flag=1"><img src="<?= $applicant_info_detail['EXHIBIT_PIC_URL']?>" height="100" alt="">
                          
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
                                <p class="Group-Item-Text">交渉中</p>
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

                        </li></a>
                      <?php } ?>

                  </ul>
                </div>

              </div>
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