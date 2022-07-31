<?php
    require 'database/database.php';
    $pdo = db_connect();
    $didSubmit = submit_score();
    // get all scores
    $scores = get_scores();
    foreach($scores as $score) {
        echo 'user: ' .$score['user'] .', score: ' .$score['score'];
    }
    // get your avg score
    // get your overall ranking
    // get your total number of games
    // add a play again button
    include 'templates/results_page.php'; 
?>