<?php

  session_start();
  $db = 'mysql:dbname=chat;host=localhost';
  $user = 'tom';
  $password = 'raspberry';
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
