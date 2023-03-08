<div class="side">
    <!-- 左サイド -->
    <div class="side-inner">
        <ul class="nav flex-colum">
            <li class="nav-item"><a href="home.php" class="nav-link"><img src="<?php echo HOME_URL; ?>views/img/白川郷の古民家のフリーアイコン.png" alt="ホーム画面アイコン" class="icon"></a></li>
            <li class="nav-item"><a href="search.php" class="nav-link"><img src="<?php echo HOME_URL; ?>views/img/虫眼鏡のアイコン.png" alt="検索アイコン"></a></li>
            <li class="nav-item"><a href="profile.php" class="nav-link"><img src="<?php echo HOME_URL; ?>views/img/伊達政宗の甲冑姿のアイコン.png" alt="自分のアイコン"></a></li>
            <li class="nav-item"><a href="post.php" class="nav-link"><img src="<?php echo HOME_URL; ?>views/img/鉛筆を持つ手のアイコン.png" alt="投稿アイコン" class="post-write"></a></li>
            <li class="nav-item my-icon"><img src="<?php echo htmlspecialchars($view_user['image_path']); ?>" alt="プロフィールアイコン" class="js-popover" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="right" data-bs-html="true" data-bs-content="<a href='profile.php'>プロフィール</a><br><a href='sign-out.php'>ログアウト</a>"></li>
        </ul>
    </div>
</div>

