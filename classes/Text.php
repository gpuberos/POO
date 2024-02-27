<?php 

class Text {

    // private static $suffix = " €";
    const SUFFIX = " €";

    public static function withZero($number){
        if ($number < 10) {
            return '0' . $number . self::SUFFIX;
        } else {
            return $number . self::SUFFIX;
        }
    }
}
