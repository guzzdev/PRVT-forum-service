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

    public function getTopicDetails($publicId)
    {
        $db = $this->dbConnect();
        $reqTopic = $db->prepare('SELECT * FROM `topic` WHERE `public_id` = :public_id');
        $reqTopic->bindParam(':public_id', $publicId);
        $reqTopic->execute();
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

    public function getTopics($page)
    {
        $nbrPage = 10;
        $end = ($page-1)*$nbrPage;

        $db = $this->dbConnect();

        // TODO: FIND A BETTER WAY TO DO THIS
        $getTopicsSQL = "SELECT * FROM `topic` ORDER BY id DESC LIMIT ".$end.",".$nbrPage; //// NOTE: TO REWORK
        $reqListTopics = $db->prepare($getTopicsSQL);
        $reqListTopics->execute();
        return $reqListTopics;
    }
}
