<?php
require_once '../include/DBconnection.php';

if($user->is_loggedin()==false)
{
  $user->redirect('../index.php');
}
else
{
  $value = $_POST['chatbox'];
  if($value)
  {

    if($user_message->createMessage($value))
    {
      $user->redirect('/chat/index.php');
    }
  }
  else
  {
    $user->redirect('/chat/index.php?error');
  }

}

?>
