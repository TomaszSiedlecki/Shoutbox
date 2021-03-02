<?php
require_once '../include/DBconnection.php';
if($user->is_loggedin()==false)
{
  $user->redirect('../index.php');
}
$user ->logout();
$user->redirect('../login.php');

?>
