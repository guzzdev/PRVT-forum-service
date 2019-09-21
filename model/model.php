<?php
class Model
{
    private function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=private_message;charset=utf8', 'root', '');
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

    public function getComments()
    {
        $db = $this->dbConnect();
        $reqComments = $db->prepare('SELECT * FROM `comments` WHERE `id_public_parent` = :public_id ORDER BY id DESC');
        $reqComments->execute(array(':public_id' => $_GET['topic']));
        return $reqComments;
    }
    
    public function getTopics()
    {
        $db = $this->dbConnect();
        $reqListTopics = $db->prepare('SELECT * FROM `topic` ORDER BY last_edit DESC');
        $reqListTopics->execute();
    
        return $reqListTopics;
    }

    public function postComment($comment, $parrentID, $userID, $userPublicID, $userName, $public_id)
    {
        $db = $this->dbConnect();
        
        $postCommentSQL = "INSERT INTO comments(`id_public`, `id_public_parent`, `text`, `author_id`, `author_public_id`, `author_name`) VALUES (:public_id, :parent_id, :text, :author_id,:author_public_id,:author_name)";
    
        $reqPostComment = $db->prepare($postCommentSQL);
        $reqPostComment->execute(array(
            'public_id' => $public_id,
            'parent_id' => $parrentID,
            'text' => $comment,
            'author_id' => $userID,
            'author_public_id' => $userPublicID,
            'author_name' => $userName));
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
}
?>