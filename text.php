
    <?php
            require_once('model/db.php');
            
            $public_id = uniqid("c"). uniqid("c");
            $parrentID = uniqid();
            $comment = "zoulouloulou";
            $userID = 1;
            $userPublicID = uniqid();
            $userName = uniqid();

            
            $db = dbConnect();
            $postCommentSQL = 
            "INSERT INTO comments(`id_public`, `id_public_parent`, `text`, `author_id`, `author_public_id`, `author_name`) VALUES (:public_id, :parent_id, :text, :author_id,:author_public_id,:author_name)";
            $postComment = $db->prepare($postCommentSQL);
            $postComment->execute(array(
                'public_id' => "111", 
                'parent_id' => "222", 
                'text' => "333", 
                'author_id' => "444", 
                'author_public_id' => "555", 
                'author_name' => "666"));
            
        
        ?>
