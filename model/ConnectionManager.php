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

    public function isPasswordGood($password, $passwordCheck){
      $validPass = preg_match("/^[a-z\d_]{8,20}$/i", $password);
      if ($validPass) {
        if($passwordCheck == $password){
          return true;
        }
        else {
          echo "Password are not the same";
          return false;
        }
      }
      else{
        echo "Password uses forbidden caracters";
        return false;
      }
    }

    public function signUp($userName, $password, $passwordVerify)
    {
        $lowerUserName = strtolower($userName);
        $validUsername = preg_match("/^[a-z\d_]{4,20}$/i", $lowerUserName);
        $validPass = $this->isPasswordGood($password, $passwordVerify);
        if ($validPass == true) {
        try {
          if ($validUsername==true) {
            $exist = $this->isUsernameUsed($lowerUserName);
            if (!$exist) {
              $passwordHash = password_hash($password, PASSWORD_DEFAULT);
              $publicId = uniqid(uniqid(substr($userName, 0,3)."-"));
              $db = $this->dbConnect();
              $addUserDB = "INSERT INTO `users` (`public_id`, `username`, `password`) VALUES (:public_id, :username, :password)";
              $signup = $db->prepare($addUserDB);
              $signup->bindParam(':public_id', $publicId, PDO::PARAM_STR);
              $signup->bindParam(':username', $userName, PDO::PARAM_STR);
              $signup->bindParam(':password', $passwordHash, PDO::PARAM_STR);
              $signup->execute();
              logIn($userName, $password);
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
          else{
            throw new \Exception("Mot de passe incorrect", 1);
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
        if(!$this->is_connected()){
            header('Location: text.php');
            exit;
        }
    }


}
