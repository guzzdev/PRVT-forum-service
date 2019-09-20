<?php
    //finish db
    function dbConnect(){ // to finish
        $db = new PDO('mysql:host=localhost;dbname=private_message;charset=utf8', 'root', '');
        return $db;
    }

?>