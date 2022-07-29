<?php
require 'config.php';

// return a PDO
function db_connect() {

  try {
    $connect = 'mysql:host=' .DBHOST .';dbname=' .DBNAME;
    $user = DBUSER;
    $password = DBPASS;

    $pdo = new PDO($connect, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $pdo;
  }
  catch (PDOException $e)
  {
    die($e->getMessage());
  }
}

// register a new user account
function handle_register() {
  global $pdo;
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['userRegister']) && isset($_POST['emailRegister']) && isset($_POST['passwordRegister'])) {
      $sql = 'INSERT INTO users (name, email, password) VALUES (:name, :email, :password);';
      $statement = $pdo->prepare($sql);
      $statement->bindValue(':name', $_POST['userRegister']);
      $statement->bindValue(':email', $_POST['emailRegister']);
      $statement->bindValue(':password', $_POST['passwordRegister']);
      $statement->execute();
    }
  }
}


// validate registration fields
function validate_email_user($email, $username) {
  if (preg_match('#^(.+)@([^\.].*)\.([a-z]{2,})$#', $email)) {
    global $pdo;
    foreach ($pdo->query('SELECT email, name FROM users') as $e) {
      if ($e['email'] == $email || $e['name'] == $username) {
        return FALSE;
      }
    }
    return TRUE;
  }
  return FALSE;
}
/*
// why is this fucked up?
// login with existing user account
function handle_login() {
  global $pdo;
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['userLogin'] && isset($_POST['passwordLogin']))) {
      $col = NULL;
      // search for email, else search by name
      if (preg_match('#^(.+)@([^\.].*)\.([a-z]{2,})$#', $user)) {
        $col = 'email';
      } else {
        $col = 'name';
      }
      if ($col != NULL) {
        // just doing by name first
        //$query = 'SELECT ' .$col  ', password FROM users;';
        $query = 'SELECT name, password FROM users;';
        foreach ($pdo->query($query) as $field) {
          //if ($field[$col] == $_POST['userLogin'] && $field['password'] == $_POST['passwordLogin']) {
            //return TRUE;
          //}
          if ($field['name'] == $_POST['userLogin'] && $field['password'] == $_POST['passwordLogin']) {
            return TRUE;
          }
        }
      }
    }
  }
  return FALSE;
}

/*
// get user id from password and name or email
function getUserID($user) {
  global $pdo;
  $col = NULL;
  $username;
  $email;
  $password;
  $userID;
  // search for email, else search by name
  if (preg_match('#^(.+)@([^\.].*)\.([a-z]{2,})$#', $user)) {
    $col = 'email';
  } else {
    $col = 'name';
  }
  foreach ($pdo->query('SELECT ' .$col  ' FROM users') as $field) {

  }
}
*/