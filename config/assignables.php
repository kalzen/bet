<?php
// config/assignables.php
$routeList = [
    "home" => [
        "name" => "Trang chủ (/home)"
    ],
    "booker.list" => [
        "name" => "Trang Nhà Cái Nổi Bật (/booker)"
    ],
    "booker.filter" => [
        "name" => "Trang Danh sách các Nhà Cái khác (/booker/abcxyz)"
    ],
    "booker.detail" => [
        "name" => "Trang xem chi tiết nhà cái (/booker/n)"
    ],
    "post.list" => [
        "name" => "Trang Danh Sách Tin tức mới hôm nay (/post)"
    ],
    "post.detail" => [
        "name" => "Trang đọc tin tức chi tiết (/post/tin-tuc-chi-tiet)"
    ],
    "tip.list" => [
        "name" => "Trang TIPS Hôm nay (/tip)"
    ],
    "livescore.index" => [
        "name" => "Trang Tỉ số bóng đá trực tiếp (/livescore)"
    ],
    "bxh.index" => [
        "name" => "Trang Bảng xếp hạng trực tiếp (/leaderboard)"
    ],
    "user.detail" => [
        "name" => "Trang Thông tin người dùng (/user/n)"
    ],
];
return $routeList;