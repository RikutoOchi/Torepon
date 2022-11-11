<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/modal.css">
  <link rel="stylesheet" href="./css/reset.css">
  <title>modal</title>
</head>
<body>
  <div class="modal-block none">
    <div class="modal-box">
    <p class="modal-ttl">取引アンケート<button class="close">×</button></p>
    
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
      <div class="modalcomment">
        <p>コメント</p>
        <textarea class="modaltextarea" name="comment" id="comment" cols="30" rows="10"></textarea>
      </div>
      <div class="modalsubmit-block"><button class="submit">完了</button></div>
    </div>
    </div>
  </div>
</body>
</html>