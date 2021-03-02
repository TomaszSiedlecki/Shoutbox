<?php
require_once '../include/DBconnection.php';

if($user->is_loggedin()==true)
{
  $user->redirect('../index.php');
}

if(isset($_POST['btn-signup']))
{
 $username = $_POST['name'];
 $email = $_POST['email'];
 $password = $_POST['psswd'];

 if($user->register($username,$email, $password) == true)
 {
   $user->redirect('../login.php?success');
 }
 else
 {
   $user->redirect('../signup.php?error');
 }
}
else {
  $user->redirect('../login.php?error');
}
?>
