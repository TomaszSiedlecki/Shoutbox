<?php
include_once('DBconnection.php');

class Message{
  private $db;

  public function __construct ($con)
  {
      $this->db = $con;
  }

  public function getAllMessages()
  {
    $stmt = $this->db->prepare("SELECT m.message, m.date, u.nickname FROM messages m INNER JOIN user u ON m.user_id = u.id  ORDER BY m.date DESC");
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return($results);
  }

  public function createMessage($string)
  {
    $uid = $_SESSION['user_session'];
    $date =  date("Y-m-d G:i:s");
    $stmt = $this->db->prepare("INSERT INTO messages(user_id, message, date ) VALUES(:u_id, :message, :date)");
    $stmt->bindparam(":u_id", $uid);
    $stmt->bindparam(":message", $string);
    $stmt->bindparam(":date", $date);
    $stmt->execute();
    return true;
  }

}

?>
