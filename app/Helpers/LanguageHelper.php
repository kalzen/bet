<?php

namespace App\Helpers;

class LanguageHelper
{
    public static function getCountryFlag($locale) 
    {
        $countryMap = [
            'en' => 'gb',
            'vi' => 'vn',
            'zh' => 'cn',
            'ja' => 'jp',
            'pt' => 'br',
            'th' => 'th',
        ];

        if (!isset($countryMap[$locale])) {
            return file_get_contents(public_path('img/flags/globe.svg'));
        }

        // Đọc nội dung file SVG
        $svgPath = public_path('img/flags/' . $countryMap[$locale] . '.svg');
        if (file_exists($svgPath)) {
            return file_get_contents($svgPath);
        }

        return file_get_contents(public_path('img/flags/globe.svg'));
    }
} 