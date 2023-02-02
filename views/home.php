<?php
// エラー表示あり
ini_set('display_errors', 1);
// 日本時間にする
date_default_timezone_set('Asia/Tokyo');
// URL/ディレクトリ設定
define('HOME_URL', 'http://localhost/orient/');


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

///////////////////////////////////////
// 便利な関数
///////////////////////////////////////

/**
 *
 * @param string $name 画像ファイル名
 * @param string $type user | tweet
 * @return string
 */

function buildImagePath(string $name = null, string $type)
{
    if ($type == 'user' && !isset($name)) {
        return HOME_URL . 'views/img/武士のフリーアイコン.png';
    }

    return HOME_URL . 'views/img_uploaded/' . $type . '/' . htmlspecialchars($name);
}

/**
    * 指定した日時からどれだけ経過したかを取得
    *
    * @param string $datetime 日時
    * @return string
    */
    function convertToDayTimeAgo(string $datetime)
    {
        $unix = strtotime($datetime);
        $now = time();
        $diff_sec = $now - $unix;

        if ($diff_sec < 60) {
            $time = $diff_sec;
            $unit = '秒前';
        } elseif ($diff_sec < 3600) {
            $time = $diff_sec / 60;
            $unit = '分前';
        } elseif ($diff_sec < 86400) {
            $time = $diff_sec / 3600;
            $unit = '時間前';
        } elseif ($diff_sec < 2764800) {
            $time = $diff_sec / 86400;
            $unit = '日前';
        } else {

            if (date('Y') !== date('Y', $unix)) {
                $time = date('Y年n月j日', $unix);
            } else {
                $time = date('n月j日', $unix);
            }
            return $time;
        }

        return (int)$time . $unit;
    }

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo HOME_URL; ?>views/img/戦国武将のアイコン.png">
    <!-- Bootstrap CSS  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo HOME_URL; ?>views/css/style.css">
    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous" defer></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous" defer></script>

    <title>非公認！漫画「オリエント」意見＆考察交流サイト</title>
    <meta name="description" content="ホーム画面です">
</head>

<body class="home">
    <div class="container">
        <div class="side">
            <div class="side-inner">
                <ul class="nav flex-colum">
                    <li class="nav-item"><a href="home.php" class="nav-link"><img src="<?php echo HOME_URL; ?>views/img/白川郷の古民家のフリーアイコン.png"
                                alt="ホーム画面アイコン" class="icon"></a></li>
                    <li class="nav-item"><a href="search.php" class="nav-link"><img src="<?php echo HOME_URL; ?>views/img/虫眼鏡のアイコン.png"
                                alt="検索アイコン"></a></li>
                    <li class="nav-item"><a href="profile.php" class="nav-link"><img
                                src="<?php echo HOME_URL; ?>views/img/伊達政宗の甲冑姿のアイコン.png" alt="自分のアイコン" ></a></li>
                    <li class="nav-item"><a href="post.php" class="nav-link"><img src="<?php echo HOME_URL; ?>views/img/鉛筆を持つ手のアイコン.png"
                                alt="投稿アイコン" class="post-write"></a></li>
                    <li class="nav-item my-icon"><img src="<?php echo HOME_URL; ?>views/img_uploaded/user/お侍さんアイコン.png" alt="プロフィールアイコン" class="js-popover" data-bs-container="body"
                        data-bs-toggle="popover" data-bs-placement="right" data-bs-html="true" data-bs-content="<a href='profile.php'>プロフィール</a><br><a href='sign-out.php'>ログアウト</a>"></li>
                </ul>
            </div>
        </div>
        <div class="main">
            <div class="main-header">
                <h1>ホーム</h1>
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

            <!-- つぶやき一覧エリア -->
            <?php if (empty($view_writes)): ?>
                <p class="p-3">投稿がありません</p>
            <?php else: ?>
                <div class="write-list">
                    <?php foreach($view_writes as $view_write): ?>
                        <div class="write">
                            <div class="user">
                                <a href="profile.php?user_id=<?php echo htmlspecialchars($view_write['user_id']); ?>">
                                    <img src="<?php  echo buildImagePath($view_write['user_image_name'], 'user'); ?>" alt="">
                                </a>
                            </div>
                            <div class="content">
                                <div class="name">
                                    <a href="profile.php?user_id=<?php echo htmlspecialchars($view_write['user_id']); ?>">
                                        <span class="nickname"><?php echo htmlspecialchars($view_write['user_nickname']); ?></span>
                                        <span class="user-name">@<?php echo htmlspecialchars($view_write['user_name']); ?> ・<?php echo convertToDayTimeAgo ($view_write['write_created_at']); ?></span>
                                    </a>
                                </div>
                                <p><?php echo $view_write['write_body'] ?></p>

                                <?php if (isset($view_write['write_image_name'])): ?>
                                    <img src="<?php echo buildImagePath($view_write['write_image_name'], 'tweet'); ?>" alt="" class="post_image">
                                <?php endif;?>

                            </div>
                        </div>
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