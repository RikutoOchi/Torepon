
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
// Dbdataオブジェクトを生成する
require_once __DIR__ . './classes/dbdata.php';
$exh = new Dbdata();
// 選択された商品を取り出す
$exhibits = $exh->getRecords('exhibits','USER_ID',$_SESSION['user_id']);
?>

<main class="main-side-content">
  <section class="main-content">
    <!-- mainコンテンツ -->
    <h1>出品リスト</h1>
     <div class="item-list"> 
     <?php   
      foreach( $exhibits  as  $exhibit ) {  
      ?>
      <div class="responsive">
          <div class="img">
            <a href="./ex-confirm.php?id=<?= $exhibit['EXHIBIT_ID']?>">
              <img
                src=".\images\<?= $exhibit['EXHIBIT_PIC_URL'] ?>"
                alt="<?= $exhibit['EXHIBIT_NAME'] ?>"
              >
            </a>
            <div class="desc"><?= $exhibit['EXHIBIT_NAME'] ?></div>
          </div>
      </div>
      <?php   
      }
      ?> 

        
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