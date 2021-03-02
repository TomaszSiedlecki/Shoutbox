<?php

  session_start();
  $db = 'mysql:dbname=DBNAME;host=localhost';
  $user = '';
  $password = '';
  try
  {
    $con = new PDO($db, $user, $password);
  }
  catch (PDOException $e)
  {
      echo 'Connection failed: ' . $e->getMessage();
  }
  include('user.php');
  include('message.php');
  
  $user = new User($con);
  $user_message = new Message($con);
?>
