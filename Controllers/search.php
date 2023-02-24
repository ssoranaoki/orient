<?php
//
//サーチコントローラー
//

// 設定を読み込み
include_once '../config.php';
// 便利な関数を読み込み
include_once '../util.php';

// 投稿データ操作モデルを読み込む
include_once '../Models/writes.php';

// ログインチェック
$user = getUserSession();
if (!$user) {
    // ログインしていない
    header('Location: ' . HOME_URL . 'Controllers/sign-in.php');
    exit;
}

//検索キーワードを取得
$keyword = null;
if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
}

// 表示用の変数
$view_user = $user;
$view_keyword = $keyword;
// 投稿一覧
$view_writes = findTweets($user, $keyword);

// 画面表示
include_once '../views/search.php';
