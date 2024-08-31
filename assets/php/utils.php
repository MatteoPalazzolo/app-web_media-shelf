<?php 
/*
function calcStarRating($rating) {
    if ($rating < 0 || $rating > 5) {
        return "invalid number";
    }
    $out = "";
    for ($i = 0; $i < 5; $i++) {
        if ($i < $rating) {
            $out = "★" . $out;
        } else {
            $out = "☆" . $out;
        }
    }
    return $out;
}*/

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

function randomInvFloat($min, $max, $strenght) {
    if ($strenght < 1) {
        die("\nERROR: The param strenght must be >= 1.");
    } elseif ($strenght === 1) {
        return randomFloat($min, $max);
    } else {
        $r = randomFloat(1, $strenght);
        //rewritten $rn = ((1/$r) - 1/$strenght) / (1 - 1/$strenght);
        $rn = ($strenght - $r) / ($r * ($strenght -1));
        return $min + $rn * ($max - $min);
    }
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

function getLocalDir($dir) {
    return substr($dir, 14);
}