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
    [
        'user_id' => 2,
        'user_name' => 'jiro',
        'user_nickname' => '次郎',
        'user_image_name' => null,
        'write_body' => '僕もです',
        'write_image_name' => '日本式の城のフリーアイコン.png',
        'write_created_at' => '2021-03-14 14:00:00',

    ]
];


?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <?php include_once('../views/common/head.php'); ?>
    <title>検索</title>
    <meta name="description" content="検索画面です">
</head>

<body class="home search text-center">
    <div class="container">
        <?php include_once('../views/common/side.php'); ?>
        <div class="main">
            <div class="main-header">
                <h1>検索</h1>
            </div>


            <!-- 検索エリア -->
            <form action="search.php" method="get">
                <div class="search-area">
                     <input type="text" class="form-control" placeholder="キーワード検索" name="keyword" value="">
                     <button type="submit" class="btn">検索</button>
                </div>
            </form>

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
    <script>
        document.addEventListener('DOMContentLoaded', function(){
            $('.js-popover').popover();
        }, false);
    </script>
</body>

</html>