<?php
////////////////////////////
// ホームコントローラー
///////////////////////////

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

// 表示用の変数
$view_user = $user;

// 投稿一覧
$view_writes = findTweets($user);

// 画面表示
include_once '../views/home.php';
