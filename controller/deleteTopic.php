<?php 
    require_once('../model/ConnectionManager.php');
    $connectionManager = new ConnectionManager();
    $connectionManager->force_connect_user();
    if($connectionManager->is_connected() AND $_SESSION['is_admin'] == 1){
        require_once('../model/TopicManager.php');
        $topicManager = new TopicManager();
        if(isset($_POST['deleteTopicId']) AND $_POST['deleteTopicAuthor']){
           $topicManager->deleteTopic($_POST['deleteTopicId'], $_POST['deleteTopicAuthor']);
           header('Location: ../topic.php?topic='.$_POST['deleteTopicId']);
        }
    header('Location: ../topic.php?topic='.$_POST['deleteTopicId']);
    }