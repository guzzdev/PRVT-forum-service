<?php
require_once 'model/db.php';

function getTopicDetails(){
    $db = dbConnect();
    $reqTopic = $db->prepare('SELECT * FROM `topic` WHERE `public_id` = :public_id');
    $reqTopic->execute(array(':public_id' => $_GET['topic']));
    $topic = $reqTopic->fetch();
    return $topic;
}