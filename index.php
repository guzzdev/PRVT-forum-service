<?php 
    try{
        $db = new PDO('mysql:host=localhost;dbname=private_message;charset=utf8', 'root', '');
    }
    catch (Exception $e){
        echo($e->getMessage());
    }
?>
