<nav class="humburger-nav">
    <ul class="nav-list">
        <li class="nav-item"><a href="./index.php">HOME</a></li>
            
        <li class="nav-item"><a href="./profile.php">プロフィール</a></li>
        <li class="nav-item"><a href="./ex-list.php">出品リスト</a></li>
        <li class="nav-item"><a href="./fav-list.php">お気に入りリスト<a></li>
        <li class="nav-item"><a href="./check.php">チケット確認</a></li>
        <li class="nav-item"><a href="./chat.php">チャット</a></li>
        <li class="nav-item"><a href="./tradelist.php">トレード中</a></li>
        <!--　修正（ログイン時→"ログアウト"、ログアウト時→"ログイン"　表記になるように修正） -->
        <?php if(isset($_SESSION['user_name']) == False){ ?>
            <li class="nav-item"><a href="./login.php">ログイン</a></li>
        <?php } else { ?> 
            <li class="nav-item"><a href="./logout.php">ログアウト</a></li>
        <?php } ?>

    </ul>
</nav>