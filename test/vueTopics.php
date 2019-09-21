<?php
require_once('model/post.php');
try{
    if (isset($_GET['topic'])) {
        require_once 'model/lists.php';
        require_once 'model/details.php';
        $topic = getTopicDetails();
        $topicDate = date_create($topic['last_edit']);
        $reqComments = getComments();
        if (isset($_POST) && !empty($_POST['comment'])) {
            $public_id = uniqid("c")."-". uniqid("c");
            postComment($_POST['comment'], $topic['public_id'], '1', "godhimself", "guzz0x", $public_id);
            header('Location: topic.php?topic='. $topic['public_id']);
        }
        require('public/included_files/head.html');
        require_once('public/included_files/header.php'); 
        require_once('view/topicSection.php');
        ?>
<body>
<section class="container">   
        <?php
        while ($comment = $reqComments->fetch()) {
            $commentDate = date_create($comment['last_edit']);
            require('view/commentsSection.php');
        }
        ?>
    </section>
    <?php
    require_once('view/formComment.php');
    }
        else{
            require_once('model/lists.php');
            if (isset($_POST) && !empty($_POST['topic-text'])) {
                $content = $_POST['topic-text'];
                $title = $_POST['topic-title'];
                $public_id = uniqid("to")."-". uniqid("to");
                postTopic($public_id, $title, $content, "god-himself", "guz0x");
                header('Location: topic.php?topic='. $public_id);
            }
            require('public/included_files/head.html');
            require_once('public/included_files/header.php');

            $reqListTopics = getTopics(); ?>
    <section class="list-topic container-fluid">
        <h1 class="text-left container text-black-50">Topics</h1>
        <div class="container">
            <?php
            while ($topics = $reqListTopics->fetch()) {
                $topicsDate = date_create($topics['last_edit']);
                require('view/topicsList.php');
            } ?>
        </div>
        <?php
            require_once('public/included_files/nav-topic.html'); ?>
    </section>
    <section class="post-page container-fluid h-50">
        <form action="" method="POST" class="container mx-auto">
            <div class="container pt-5">
                <div class="form-group">
                    <label for="inputUsername">Title :</label>
                    <input name="topic-title" type="text" id="TitleInput" class="form-control mx-sm-3" aria-describedby="TitleInput">
                    <small id="TitleInput" class="text-white-50">
                        This is the subject of the discution
                    </small>
                </div>
                <div class="form-group">
                    <label for="inputUsername">Text :</label>
                    <textarea name="topic-text" type="text" id="inputText" class="form-control mx-sm-3"
                        aria-describedby="TextInput"></textarea>
                </div>
                <input type="submit" value="Send" class="container btn btn-light">
            </div>
        </form>
    </section>
    <?php
        }
    
    }catch(Exception $e){
        echo 'Error :' . $e->getMessage();
    }?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/js/bootstrap.js"></script>
</body>

</html>