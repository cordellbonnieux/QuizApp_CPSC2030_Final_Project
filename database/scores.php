<?php
// might replace this with js cause i have a slight destain for php
function getAvgScore($username, $scores) {
    $total = 0;
    $divisor = 0;
    for ($i = 0; i < count($scores); $i++) {
        if ($scores[i]['user'] == $username) {
            $total += (int) $scores[i]['score'];
            $divisor++;
        }
    }
    return round($total / $divisor);
}