<?php
// config/assignables.php
//'bookers/promotion', 'bookers/cassino', 'bookers/slot-ranhura', 'bookers/esportes', 'bookers/horse-racing'
$routeList = [
    "home" => [
        "name" => "Trang chủ (/home)"
    ],
    "booker.list" => [
        "name" => "Trang Nhà Cái Nổi Bật (/booker)"
    ],
    "booker.filter,promotion" => [
        "name" => "Trang Danh sách các Nhà Cái khuyến mại (/booker/promotion)",
        "param" => "promotion"
    ],
    "booker.filter,cassino" => [
        "name" => "Trang Danh sách các Nhà Cái sòng bạc (/booker/cassino)",
        "param" => "cassino"
    ],
    "booker.filter,slot-ranhura" => [
        "name" => "Trang Danh sách các Nhà Cái slot ranhura (/booker/slot-ranhura)",
        "param" => "slot-ranhura"
    ],
    "booker.filter,esportes" => [
        "name" => "Trang Danh sách các Nhà Cái thể thao (/booker/esportes)",
        "param" => "esportes"
    ],
    "booker.filter,horse-racing" => [
        "name" => "Trang Danh sách các Nhà Cái đua ngựa (/booker/horse-racing)",
        "param" => "horse-racing"
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