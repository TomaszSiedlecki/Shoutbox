<?php
include_once('DBconnection.php');

class User
{
  private $db;

  public function __construct ($con)
  {
      $this->db = $con;
  }

  public function register($nickname, $email, $password)
  {
    try
    {
      $stmt = $this->db->prepare("SELECT * FROM user WHERE nickname=:nickname OR email=:email");
      $stmt->execute(array(':nickname'=>$username, ':email'=>$email));
      $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
      if($stmt->rowCount() >= 1)
      {
        return false;
      }
      else
      {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->db->prepare("INSERT INTO user(nickname,email,password) VALUES(:username, :email, :password)");
        $stmt->bindparam(":username", $nickname);
        $stmt->bindparam(":email", $email);
        $stmt->bindparam(":password", $hashed_password);
        $stmt->execute();
        return true;
      }
    }
    catch (PDOException $e)
    {
      echo $e->getMessage();
    }
  }

  public function login($username, $password)
  {
    try
    {
      $stmt = $this->db->prepare("SELECT * FROM user WHERE nickname=:nickname LIMIT 1");
      $stmt->execute(array(':nickname'=>$username));
      $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
      if($stmt->rowCount() > 0)
      {
        if(password_verify($password, $userRow['password']))
        {
            $_SESSION['user_session'] = $userRow['id'];
            return true;
        }
        else
        {
           return false;
        }
      }
    }
    catch (PDOException $e)
    {
      echo $e->getMessage();
    }
  }

  public function is_loggedin()
  {
    if(isset($_SESSION['user_session']))
    {
      return true;
    }
    else {
      return false;
    }
  }

  public function redirect($url)
  {
    header("Location: $url");
  }

  public function logout()
  {
    session_destroy();
    unset($_SESSION['user_session']);
    return true;
  }

}
?>
