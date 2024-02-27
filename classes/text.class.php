<?php 

class Text {
    public static function withZero($number){
        if ($number < 10) {
            return '0' . $number;
        } else {
            return $number;
        }
    }
}