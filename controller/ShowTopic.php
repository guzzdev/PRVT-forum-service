<?php
require_once('model/ConnectionManager.php');
require_once('model/CommentManager.php');
require_once('model/TopicManager.php');

$forceConnection = new ConnectionManager();
$forceConnection->force_connect_user();

$topicManager = new TopicManager();
$topic = $topicManager->getTopicDetails($_GET['topic']);

$commentManager = new CommentManager();

if(isset($_GET['page']) AND !empty($_GET['page'])){
  $page = $_GET['page'];
  $reqComments = $commentManager->getComments($_GET['topic'], intval($page));

}
else {
  $page = 1;
  $reqComments = $commentManager->getComments($_GET['topic'], $page);
}
$topicDate = date_create($topic['last_edit']);

if (isset($_POST['send']) AND isset($_POST['comment'])) {
  if (!empty($_POST['comment'])) {
    $commentManager = new CommentManager();
    $public_id = uniqid(uniqid());
    $commentManager->postComment(htmlspecialchars($_POST['comment']), htmlspecialchars($_GET['topic']), htmlspecialchars($_SESSION['public_id']), htmlspecialchars($_SESSION['username']), $public_id);
    header('Location: topic.php?topic='.$_GET['topic'].'#'.$public_id);
  }
}

require('view/viewTopics.php');
