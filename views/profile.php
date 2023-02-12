<?php
// 設定関連を読み込む
include_once('../config.php');
// 便利な関数を読み込む
include_once('../util.php');

// 投稿一覧
//
$view_writes = [
    [
        'user_id' => 1,
        'user_name' => 'naoki',
        'user_nickname' => '尚希',
        'user_image_name' => 'お侍さんアイコン.png',
        'write_body' => 'オリエント最高',
        'write_image_name' => null,
        'write_created_at' => '2021-03-15 14:00:00',

    ],
];

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <?php include_once('../views/common/head.php'); ?>
    <title>非公認！漫画「オリエント」意見＆考察交流サイト</title>
    <meta name="description" content="プロフィール画面です">
</head>

<body class="home profile text-center">
    <div class="container">
        <?php include_once('../views/common/side.php'); ?>
        <div class="main">
            <div class="main-header">
                <h1>尚希</h1>
            </div>

            <!-- プロフィールエリア -->
            <div class="profile-area">
                <div class="top">
                    <div class="user"><img src="<?php echo HOME_URL; ?>views/img_uploaded/user/お侍さんアイコン.png" alt=""></div>

                    <?php if (isset($_GET['user_id'])) : ?>
                        <!-- 相手のページ -->
                        <?php if (isset($_GET['case'])) : ?>
                            <button class="btn btn-sm">フォローを外す</button>
                        <?php else : ?>
                            <button class="btn btn-sm btn-reverse">フォローする</button>
                        <?php endif; ?>
                    <?php else : ?>
                        <!-- 自分のページ -->
                        <button class="btn btn-reverse btn-sm" data-bs-toggle="modal" data-bs-target="#js-modal">プロフィール編集</button>
                    <?php endif; ?>


                    <div class="modal fade" id="js-modal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="profile.php" method="post" enctype="multipart/form-data">
                                    <div class="modal-header">
                                        <h5 class="modal-title">プロフィールを編集</h5>
                                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="user">
                                            <img src="<?php echo HOME_URL; ?>views/img_uploaded/user/お侍さんアイコン.png" alt="">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="mb-1">プロフィール写真</label>
                                            <input type="file" class="form-control form-control-sm" name="image">
                                        </div>

                                        <input type="text" class="form-control mb-4" name="nickname" value="尚希" placeholder="ニックネーム" maxlength="50" required>
                                        <input type="text" class="form-control mb-4" name="name" value="naoki" placeholder="ユーザー名" maxlength="50" required>
                                        <input type="email" class="form-control mb-4" name="email" value="naoki@techis.jp" placeholder="メールアドレス" maxlength="254" required>
                                        <input type="password" class="form-control mb-4" name="password" value="" placeholder="パスワードを変更する場合ご入力ください" minlength="4" maxlength="128">
                                    </div>

                                    <div class="modal-footer">
                                        <button class="btn btn-reverse" data-bs-dismiss="modal">キャンセル</button>
                                        <button class="btn" type="submit">保存する</button>
                                    </div>


                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="name">尚希</div>
                <div class="text-muted">@naoki</div>

                <div class="follow-follower">
                    <div class="follow-count">1</div>
                    <div class="follow-text">フォロー中</div>
                    <div class="follow-count">1</div>
                    <div class="follow-text">フォロワー</div>
                </div>
            </div>

            <!-- 仕切りエリア -->
            <div class="ditch"></div>

            <!-- つぶやき一覧エリア -->
            <?php if (empty($view_writes)) : ?>
                <p class="p-3">投稿がありません</p>
            <?php else : ?>
                <div class="write-list">
                    <?php foreach ($view_writes as $view_write) : ?>
                        <?php include('../views/common/write.php'); ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('.js-popover').popover();
        }, false);
    </script>
</body>

</html>