<?php
require_once('model/db.php');

function getComments(){
    $db = dbConnect();
    $reqComments = $db->prepare('SELECT * FROM `comments` WHERE `id_public_parent` = :public_id ORDER BY id DESC');
    $reqComments->execute(array(':public_id' => $_GET['topic']));
    return $reqComments;
}



function getTopics(){
    $db = dbConnect();
    $reqListTopics = $db->prepare('SELECT * FROM `topic` ORDER BY last_edit DESC');
    $reqListTopics->execute();

    return $reqListTopics;
}

