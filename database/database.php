<?php
define('DBHOST', $_SERVER['MYSQLHOST']);
define('DBNAME', $_SERVER['MYSQLDATABASE']);
define('DBPORT', $_SERVER['MYSQLPORT']);
define('DBUSER', $_SERVER['MYSQLUSER']);
define('DBPASS', $_SERVER['MYSQLPASSWORD']);
define('UNSPLASH_SECRET', 'NmsbcQxQA6yzPwzTBZfF8jF3Exfakj22EHVfJwvd1lc');
define('UNSPLASH_ACCESS', 'YKrSKDkWtiHZi2XLIPzQPFTExaO4dcwI86rGbCdijIM');


// return a PDO
function db_connect() {
  try {
    $connect = 'mysql:host=' .DBHOST .';port=' .DBPORT .';dbname=' .DBNAME;
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

// get unsplash api data
function getUnsplashData() {
  return array('secret'=>UNSPLASH_SECRET,'access'=>UNSPLASH_ACCESS);
}

// register a new user account, return name and email
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

      return array("name"=>$_POST['userRegister'], "email"=>$_POST['emailRegister'], "password"=>$_POST['passwordRegister']);
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

// login to account, return name and email
function handle_login() {
  global $pdo;
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['userLogin']) && isset($_POST['passwordLogin'])) {
      if (!empty($_POST['userLogin']) && !empty($_POST['passwordLogin'])) {
        $col = NULL;
        $query = 'SELECT name, email, password FROM users';
        if (preg_match('#^(.+)@([^\.].*)\.([a-z]{2,})$#', $_POST['userLogin'])) {
          $col = 'email';
        } else {
          $col = 'name';
        }
        if ($col != NULL) {
          //$query = 'SELECT ' .$col  ', password FROM users;';
          foreach ($pdo->query($query) as $field) {
            if ($field[$col] == $_POST['userLogin'] && $field['password'] == $_POST['passwordLogin']) {
              return array("name"=>$field['name'], "email"=>$field['email'], "password"=>$field['password']);
            }
          }
        }
      }
    }
  }
  return NULL;
}

// submit score at the end of a game
function submit_score() {
  global $pdo;
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['user']) && isset($_POST['score'])) {
      $sql = 'INSERT INTO scores (score, user) VALUES (:score, :user)';
      $statement = $pdo->prepare($sql);
      $statement->bindValue(':score', $_POST['score']);
      $statement->bindValue(':user', $_POST['user']);
      $statement->execute();
      return $_POST['score'];
    }
  }
  return FALSE;
}

// get all scores
function get_scores() {
  global $pdo;
  $arr = array();
  foreach($pdo->query('SELECT * FROM scores') as $score) {
    $item = array('score'=>$score['score'], 'user'=>$score['user']);
    array_push($arr, $item);
  }
  return $arr;
}

// delete scores by user
function delete_scores($user) {
  global $pdo;
	$del = $pdo->prepare("DELETE FROM scores WHERE user= :u;");
	$del->bindParam(':u', $user);
	$del->execute();
}

// delete user
function delete_user($user) {
  global $pdo;
	$del = $pdo->prepare("DELETE FROM users WHERE name= :u;");
	$del->bindParam(':u', $user);
	$del->execute();
}