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

// login
function handle_login() {
  global $pdo;
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

  }
}

// register
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


//
// below is all copied from my assignment
//


// Handle form submission
function handle_form_submission() {
  global $pdo;

  if($_SERVER["REQUEST_METHOD"] == "POST")
  {
    // TODO
    if(isset($_POST['email']) && isset($_POST['mood']) && isset($_POST['comment'])) {
      $sql = 'INSERT INTO comments (email, mood, date, commentText) VALUES (:email, :mood, :date, :commentText);';
      $statement = $pdo->prepare($sql);

      $statement->bindValue(':email', $_POST['email']);
      $statement->bindValue(':mood', $_POST['mood']);
      $statement->bindValue(':date', date('Y/m/d'));
      $statement->bindValue(':commentText', $_POST['comment']);
      
      $statement->execute();
    }
  }
}

// Get all comments from database and store in $comments
function get_comments() {
  global $pdo;
  global $comments;

  //TODO
  $sql = 'SELECT ID, date, mood, email, commentText FROM comments ORDER BY ID DESC;';
  $result = $pdo->query($sql);

  while($row = $result->fetch()) {
    $comments[] = $row;
  }
}

// Get unique email addresses and store in $commenters
function get_commenters() {
  global $pdo;
  global $commenters;

  //TODO
  $sql = 'SELECT DISTINCT email FROM comments;';
  $result = $pdo->query($sql);
  //
  $commenters = [];

  while($email = $result->fetch()) {
    //$commenters = $email;
    array_push($commenters, $email);
  }
}
