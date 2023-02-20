<?php
////////////////////////////
// ホームコントローラー
///////////////////////////

// 設定を読み込み
include_once '../config.php';
// 便利な関数を読み込み
include_once '../util.php';

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

// 画面表示
include_once '../views/home.php';
