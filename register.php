<?php
    require_once 'database/database.php';
    $pdo = db_connect();
    handle_register();
?>
<h1>nice you registered</h1>