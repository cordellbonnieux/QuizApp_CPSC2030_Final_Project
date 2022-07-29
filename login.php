<link rel="stylesheet" href="css/style.css">
<?php
    require 'database/database.php';
    $pdo = db_connect();
    if(TRUE) {
        // logged in!
        echo '<h1>nice you are logged in</h1>';
    } else {
        // password or user name did not match
        echo '<span class="alert">username/email or password did not match, please try again.</span>';
        // say email exists then redirect to index
        include 'index.php';
    }
?>