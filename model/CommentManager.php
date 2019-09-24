<?php
//coded by guzz0x 21/09/2019
class CommentManager
{
    private function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=private_message;charset=utf8', 'root', '');
        return $db;
    }

    public function postComment($comment, $parrentID, $userPublicID, $userName, $public_id)
    {
        $db = $this->dbConnect();

        $postCommentSQL = "INSERT INTO comments(`id_public`, `id_public_parent`, `text`, `author_public_id`, `author_name`) VALUES (:public_id, :parent_id, :text, :author_public_id,:author_name)";

        $reqPostComment = $db->prepare($postCommentSQL);
        $reqPostComment->execute(array(
            'public_id' => $public_id,
            'parent_id' => $parrentID,
            'text' => $comment,
            'author_public_id' => $userPublicID,
            'author_name' => $userName));
    }

    public function getComments($topicID, $page)
    {
      $nbrPage = 20;
      $end = ($page-1)*$nbrPage;

      // TODO: FIND A BETTER WAY TO DO THIS
      $getCommentsSQL = "SELECT * FROM `comments` WHERE `id_public_parent` = :public_id ORDER BY id DESC LIMIT ".$end.",".$nbrPage; //// NOTE: TO REWORK

      $db = $this->dbConnect();
      $reqComments = $db->prepare($getCommentsSQL);
      $reqComments->bindParam(":public_id", $topicID);
      $reqComments->execute();
      return $reqComments;
    }

}
