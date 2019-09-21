<?php
//coded by guzz0x 21/09/2019
class TopicManager
{
    private function dbConnect()
    {
        try{    
            $db = new PDO('mysql:host=localhost;dbname=private_message;charset=utf8', 'root', '');
        } catch(Exception $e){
            return $e->getMessage();
        }
        return $db;
    }

    public function getTopicDetails()
    {
        $db = $this->dbConnect();
        $reqTopic = $db->prepare('SELECT * FROM `topic` WHERE `public_id` = :public_id');
        $reqTopic->execute(array(':public_id' => $_GET['topic']));
        $topic = $reqTopic->fetch();
        return $topic;
    }

    public function postTopic($public_id, $title, $content, $userPublicID, $authorName)
    {
        $db = $this->dbConnect();
            
        $postCommentSQL = "INSERT INTO topic(`public_id`, `title`, `text`, `author_name`, `author_public_id`) VALUES (:public_id, :title, :text, :author_name, :author_public_id)";
        
        $reqPostComment = $db->prepare($postCommentSQL);
        $reqPostComment->execute(array(
            'public_id' => $public_id,
            'title' => $title,
            'text' => $content,
            'author_name' => $authorName,
            'author_public_id' => $userPublicID));
    }

    public function getTopics($x=1)
    {
        $end = $x*10;
        $start = $x*10-10;
        $db = $this->dbConnect();
        $getTopicsSQL = "SELECT * FROM `topic` ORDER BY last_edit DESC LIMIT 0, 10";
        $reqListTopics = $db->prepare($getTopicsSQL);
        $reqListTopics->execute(array(
            'slim' => $start,
            'elim' => $end));
        return $reqListTopics;
    }
}