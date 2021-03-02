<?php
require_once '../include/DBconnection.php';
if($user->is_loggedin()==false)
{
  $user->redirect('../index.php');
}
$data = $user_message ->getAllMessages();
header("Access-Control-Allow-Origin: *");//this allows cors
header('Content-Type: application/json');
echo json_encode($data);


?>
