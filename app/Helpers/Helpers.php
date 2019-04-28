<?php

namespace App\Helpers;


class Helpers
{
    static function clean_text($text) {
        return  htmlspecialchars_decode(html_entity_decode($text));
    }
}
