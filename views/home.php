<!DOCTYPE html>
<html lang="ja">

<head>
    <?php include_once('../views/common/head.php'); ?>
    <title>非公認！漫画「オリエント」意見＆考察交流サイト</title>
    <meta name="description" content="ホーム画面です">
</head>

<body class="home">
    <div class="container">
        <?php include_once('../views/common/side.php'); ?>
        <div class="main">
            <div class="main-header">
                <h1>非公認！漫画「オリエント」意見＆考察交流サイト!</h1>
            </div>

            <!-- 投稿エリア -->
            <div class="write-post">
                <div class="my-icon">
                    <img src="<?php echo htmlspecialchars($view_user['image_path']) ?>" alt="">
                </div>
                <div class="input-area">
                    <form action="post.php" method="post" enctype="multipart/form-data">
                        <textarea name="body" placeholder="考察＆感想書いてね" maxlength="200"></textarea>
                        <div class="bottom-area">
                            <div class="mb-0">
                                <input type="file" name="image" class="form-control form-control-sm">
                            </div>
                            <button class="btn" type="submit">投稿</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- 仕切りエリア -->
            <div class="ditch"></div>

            <!-- つぶやき一覧エリア -->
            <?php if (empty($view_writes)): ?>
                <p class="p-3">投稿がありません</p>
            <?php else: ?>
                <div class="write-list">
                    <?php foreach($view_writes as $view_write): ?>
                        <?php include('../views/common/write.php'); ?>
                    <?php endforeach; ?>
                    </div>
            <?php endif; ?>
        </div>
    </div>
    <?php include_once('../views/common/foot.php'); ?>
</body>

</html>