<?php
require('model/TopicManager.php');

if(isset($_GET['topic']) AND !empty($_GET['topic'])){
}
else{
    $topicManager = new TopicManager();
    if(isset($_GET['page']) AND !empty($_GET['page'])){
        $reqListTopics = $topicManager->getTopics($_GET['page']);
    }
    $reqListTopics = $topicManager->getTopics();
    require('view/topicsList.php');
}