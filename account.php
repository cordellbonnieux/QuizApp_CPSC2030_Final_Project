<link rel="stylesheet" href="css/style.css">
<?php
require 'database/database.php';
$pdo = db_connect();
$banner = '';
$user;
//$loadPage = FALSE;
// coming from index login or register
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['submitRegister'])) {
        // this is a registration
        if (validate_email_user($_POST['emailRegister'], $_POST['userRegister'])) {
            $user = handle_register();
            $scores = get_scores();
            $loadPage = TRUE;
            include 'templates/account_page.php';
        } else {
            $user = NULL;
            $banner = 'Email or username already exists, please try another.';
            include 'redirect.php';
        }
    } else if (isset($_POST['submitLogin'])) {
        // this is a login
        $user = handle_login();
        if($user) {
            // logged in
            $scores = get_scores();
            $loadPage = TRUE;
            include 'templates/account_page.php';
        } else {
            // password or user name did not match
            $banner = 'Username/email or password did not match, please try again.';
            include 'redirect.php';
        }
    }
} else {
// coming from link or stored login
    include 'index.php';
    // index will redirect back here using a POST to validate login
}
