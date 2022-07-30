<?php
    require 'database/database.php';
    $didSubmit = submit_score();
    include 'templates/results_page.php';
?>