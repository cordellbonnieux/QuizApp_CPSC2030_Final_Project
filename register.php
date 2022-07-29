<?php
    require 'database/database.php';
    $pdo = db_connect();
    $user;
    if (validate_email($_POST['emailRegister'])) {
        $user = handle_register();
        echo '<h1>nice you registered</h1>';
    } else {
        $user = NULL;
        echo '<h1>shit email exists already</h1>';
    }
?>
