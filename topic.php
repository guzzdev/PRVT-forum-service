<?php
if(isset($_GET['topic']) AND !empty($_GET['topic'])){
  require_once('controller/ShowTopic.php');
}
else{
  require_once('controller/TopicsList.php');
}
