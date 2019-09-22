<?php
class ConnectionManager
{
    private function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=private_message;charset=utf8', 'root', '');
        return $db;
    }

    public function isUsernameUsed($username)
    {
      $db = $this->dbConnect();
      $checkForUsernameSQL = "SELECT `username` FROM users WHERE username = ? LIMIT 1";

      $checkUser = $db->prepare("SELECT * FROM users WHERE username= :username");
      $checkUser->bindParam(':username', $username, PDO::PARAM_STR);
      $checkUser->execute();
      return $checkUser->fetch();
    }

    public function signUp($userName, $password)
    {
        $lowerUserName = strtolower($userName);
        $validUsername = preg_match("/^[a-z\d_]{4,20}$/i", $lowerUserName);
        try {
          if ($validUsername==true) {
            $exist = $this->isUsernameUsed($lowerUserName);
            if (!$exist) {
              echo "<br>Your username is ok.\t\t";
              echo "<br>";
              echo $password;
              $passwordHash = password_hash($password, PASSWORD_DEFAULT);
              $publicId = uniqid(uniqid(substr($userName, 0,3)."-"));
              $db = $this->dbConnect();
              $addUserDB = "INSERT INTO `users` (`public_id`, `username`, `password`) VALUES (:public_id, :username, :password)";
              $signup = $db->prepare($addUserDB);
              $signup->bindParam(':public_id', $publicId, PDO::PARAM_STR);
              $signup->bindParam(':username', $userName, PDO::PARAM_STR);
              $signup->bindParam(':password', $passwordHash, PDO::PARAM_STR);
              $signup->execute();
            }
            else {
              throw new \Exception("Username is already used", 2);
            }
          } else {
            throw new \Exception("Username is not correct", 1);
          }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function logIn($username, $password){
          $db = $this->dbConnect();
          $pass_exist = $db->prepare('SELECT password FROM users WHERE username = :username');
          $pass_exist->bindParam(':username', $username, PDO::PARAM_STR);
          $pass_exist->execute();
          $result = $pass_exist->fetch();
          $isPasswordCorrect = password_verify($password, $result['password']); // send a bool
          if($isPasswordCorrect){
              $_SESSION['connected'] = 1;
              header('Location: topic.php');
          }
        return $isPasswordCorrect;
    }


    public function getUser($username){
          $db = $this->dbConnect();
          $reqGetUser = $db->prepare('SELECT * FROM users WHERE username = :username');
          $reqGetUser->bindParam(':username', $username, PDO::PARAM_STR);
          $reqGetUser->execute();
          return $reqGetUser;
    }

    public function is_connected(){
        if(session_status() == PHP_SESSION_NONE){
            session_start();
        }
        return !empty($_SESSION['connected']);
    }

    public function force_connect_user(): void {
        if(!is_connect()){
            header('Location: login.php');
            exit;
        }
    }


}
