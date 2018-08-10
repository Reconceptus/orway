<?php

namespace frontend\helpers;

class StaticPages
{
    public static function get()
    {
        return [
            'about',

        ];
    }

    public static function asRule() {
        return '<page:'.implode('|', self::get()).'>';
    }
}