<?php
// 設定関連を読み込む
include_once('../config.php');
// 便利な関数を読み込む
include_once('../util.php');


?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <?php include_once('../views/common/head.php'); ?>
    <title>投稿画面</title>
    <meta name="description" content="投稿画面です">
</head>

<body class="home">
    <div class="container">
        <?php include_once('../views/common/side.php'); ?>
        <div class="main">
            <div class="main-header">
                <h1>投稿エリア</h1>
            </div>

            <!-- 投稿エリア -->
            <div class="write-post">
                <div class="my-icon">
                    <img src="<?php echo HOME_URL; ?>views/img_uploaded/user/お侍さんアイコン.png" alt="">
                </div>
                <div class="input-area">
                    <form action="post.php" method="post" enctype="multipart/form-data">
                        <textarea name="body" placeholder="考察＆感想書いてね" maxlength="200"></textarea>
                        <div class="bottom-area">
                            <div class="mb-0">
                                <input type="file" name="image" class="form-control form-control-sm">
                            </div>
                            <button class="btn" type="submit">発表</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- 仕切りエリア -->
            <div class="ditch"></div>

        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function(){
            $('.js-popover').popover();
        }, false);
    </script>
</body>

</html>