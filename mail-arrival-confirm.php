<!-- ヘッドの全体に関わる共有部分 -->
<?php require_once('./temp/head.php'); ?>
<!-- /ヘッドの全体に関わる共有部分 -->

<!-- ↓↓↓　ここに各画面専用のスタイルのリンクタグを書きます ↓↓↓ -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Modaal/0.4.4/css/modaal.css"/>
<link rel="stylesheet" href="./css/mailconfirm.css">
<link rel="stylesheet" href="./css/modal.css">

<!-- ↑↑↑　/ここに各画面専用のスタイルのリンクタグを書きます　↑↑↑ -->

<!-- ヘッダー -->
<?php require_once("./temp/header.php"); ?>
<!-- /ヘッダー -->

    <main class="main-side-content">
      <section class="main-content">
        <!-- mainコンテンツ -->
        

        <!-- 到着が未完了と完了時で表示を切り替える -->
        <!-- 出品者側の画面 -->
        <!-- 出品者側は発送が完了した時点でアンケート評価 -->
      <div class="center">
        <h1 class="none sub-ttl ">〇〇(商品名)は発送中です。</h1>
        <h1 class="sub-ttl">〇〇(商品名)は発送完了しました。</h1>
      </div>
       <!-- /到着が未完了と完了時で表示を切り替える -->
       <div class="btn-block">
        <p><a href="#info" class="modal-open q-btn" >評価する</a></p>
       </div>
  <section id="info" class="none">
    <p class="modal-ttl">取引アンケート</p>
    
    <div class="modalreview">
      <div class="modalreview-box">
        <div></div>
        <ul class="modalitem-list">
          <li class="modalitem">最低</li>
          <li class="modalitem">最高</li>
        </ul>
        <p>マナー</p>
        <ul class="modalstars">
        <!-- クリック時色の変化（後ほどjsで実装する） -->
          <li class="modalstar" value="1"><p>☆</p></li>
          <li class="modalstar" value="2"><p>☆</p></li>
          <li class="modalstar" value="3"><p>☆</p></li>
          <li class="modalstar" value="4"><p>☆</p></li>
          <li class="modalstar" value="5"><p>☆</p></li>
        </ul>
        <p>言葉遣い・言動</p>
        <ul class="modalstars">
        <!-- クリック時色の変化（後ほどjsで実装する） -->
          <li class="modalstar" value="1"><p>☆</p></li>
          <li class="modalstar" value="2"><p>☆</p></li>
          <li class="modalstar" value="3"><p>☆</p></li>
          <li class="modalstar" value="4"><p>☆</p></li>
          <li class="modalstar" value="5"><p>☆</p></li>
        </ul>
        <p>返信スピード</p>
        <ul class="modalstars">
        <!-- クリック時色の変化（後ほどjsで実装する） -->
          <li class="modalstar" value="1"><p>☆</p></li>
          <li class="modalstar" value="2"><p>☆</p></li>
          <li class="modalstar" value="3"><p>☆</p></li>
          <li class="modalstar" value="4"><p>☆</p></li>
          <li class="modalstar" value="5"><p>☆</p></li>
        </ul>
      </div>
      <br></br>
      <div class="modalcomment">
        <p>コメント</p>
        <textarea class="modaltextarea" name="comment" id="comment" cols="30" rows="10"></textarea>
      </div>
      <div class="modalsubmit-block"><button class="submit">完了</button></div>
    </div>
  </section>

</section>

<!-- サイドコンテンツ -->
<?php require_once('./temp/side.php'); ?>
<!-- /サイドコンテンツ -->

</main>
<!-- /mainコンテンツ -->

<!-- フッター -->



<?php require_once('./temp/footer.php'); ?>
<!-- /フッター -->
