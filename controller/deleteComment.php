<?php 
    require_once('../model/ConnectionManager.php');
    $connectionManager = new ConnectionManager();
    $connectionManager->force_connect_user();
    if($connectionManager->is_connected() AND $_SESSION['is_admin'] == 1){
        require_once('../model/CommentManager.php');
        $CommentManager = new CommentManager();
        if(isset($_POST['deleteCommentId']) AND $_POST['deleteCommentAuthor']){
           $CommentManager->deleteComment($_POST['deleteCommentId']);
           header('Location: ../topic.php?topic='.$_POST['deleteCommentIdParrent']);
        }
    }