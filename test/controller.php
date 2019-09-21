<?php
require('model.php');

if(isset($_GET['topic'])){
}
else{
    $reqListTopics = getTopics();
    require('topicsList.php');

}