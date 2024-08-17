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