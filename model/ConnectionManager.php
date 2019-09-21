<?php
class ConnectionManager
{
    private function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=private_message;charset=utf8', 'root', '');
        return $db;
    }

    public function signUp($userName, $password){

        $userName = strtolower($userName);
        //match username
        $userNamee = preg_match('[<\s*a[^>]*>(.*?)<\s*/\s*a>]', $userName);

        $username = "user_name1eeee2";
        if (preg_match("/^[a-z\d_]{5,20}$/i", $username)) {
        echo "Your username is ok.";
        } else {
        echo "Wrong username format.";
        }

        echo $userNamee;
        echo "<br>";
        
        echo $password;
        echo "<br>";

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        echo $passwordHash;
        echo "<br>";

        $publicId = uniqid(uniqid(substr($userName, 0,3)."-"));
        echo $publicId;

        $addUserDB = "INSERT INTO `users` (`public_id`, `username`, `password`) VALUES (':public_id', ':username', ':password')";

        $db = $this->dbConnect();
        $signup = $db->prepare($addUserDB);
        $signup->execute(array(
            'public_id' => $publicId,
            'username' => $userName,
            'password' => $passwordHash
        ));
    }
}