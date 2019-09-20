<?php 
require_once 'model/db.php';

function postComment($comment, $parrentID, $userID, $userPublicID, $userName, $public_id){
    $db = dbConnect();
    
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

function postTopic($public_id, $title, $content, $userPublicID, $authorName){
    $db = dbConnect();
        
    $postCommentSQL = "INSERT INTO topic(`public_id`, `title`, `text`, `author_name`, `author_public_id`) VALUES (:public_id, :title, :text, :author_name, :author_public_id)";
    
    $reqPostComment = $db->prepare($postCommentSQL);
    $reqPostComment->execute(array(
        'public_id' => $public_id, 
        'title' => $title, 
        'text' => $content, 
        'author_name' => $authorName,
        'author_public_id' => $userPublicID));
    }