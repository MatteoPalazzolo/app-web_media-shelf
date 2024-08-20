<?php 

function calcStarRating($rating) {
    if ($rating < 0 || $rating > 5) {
        return "invalid number";
    }
    $out = "";
    for ($i = 0; $i < 5; $i++) {
        if ($i < $rating) {
            $out .= "★";
        } else {
            $out .= "☆";
        }
    }
    return $out;
}

function isColorBright($color) {
    if (strlen($color) !== 7)
        die("\nERROR: Only colors in the format #FFFFFF are allowed.");

    $r = hexdec(substr($color, 1, 2));
    $g = hexdec(substr($color, 3, 2));
    $b = hexdec(substr($color, 5, 2));

    $brightness = sqrt(0.299 * ($r * $r) + 0.587 * ($g * $g) + 0.114 * ($b * $b));

    return $brightness > 127.5;
}

function randomFloat($min, $max) {
    return $min + mt_rand() / mt_getrandmax() * ($max - $min);
}

/*
function generateRandomString($length) {
    //$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $characters = 'abcdefghijklmnopqrstuvwxyz';
    $charactersLength = strlen($characters);
    $randomString = '';

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[random_int(0, $charactersLength - 1)];
    }

    return $randomString;
}
*/