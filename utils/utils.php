<?php function calcStarRating($rating) {
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
} ?>