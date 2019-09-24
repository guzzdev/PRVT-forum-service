<?php
require_once('model/ConnectionManager.php');
$forceConnection = new ConnectionManager();
$forceConnection->force_connect_user();

require('model/TopicManager.php');

$topicManager = new TopicManager();

if(isset($_GET['page']) AND !empty($_GET['page'])){
  $page = $_GET['page'];
  $reqListTopics = $topicManager->getTopics(intval($page));
}

else {
  $page = 1;
  $reqListTopics = $topicManager->getTopics($page);
}

if (isset($_POST['send']) AND isset($_POST['title']) AND isset($_POST['text'])) {
  if (!empty($_POST['title']) AND !empty($_POST['text'])) {
    $public_id = uniqid(uniqid());
    $topicManager->postTopic($public_id, htmlspecialchars($_POST['title']), htmlspecialchars($_POST['text']), $_SESSION['public_id'], $_SESSION['username']);
    header('Location: topic.php?topic='.$public_id);
  }
}

require('view/viewList.php');
