<?php
require_once '../include/DBconnection.php';

if($user->is_loggedin()==true)
{
  $user->redirect('../index.php');
}

if(isset($_POST['btn-login']))
{
  $username = $_POST['name'];
  $password = $_POST['psswd'];

  if($user->login($username,$password) == true)
  {
    $user->redirect('/chat/index.php');
  }
  else
  {
    $user->redirect('/chat/login.php?error');
  }
}
else {
  $user->redirect('../login.php?error');
}
?>
