<a href="topic.php" class="btn btn-lg btn-outline-primary float-right text-right m-5">Back to topics list</a>
<section class="container">
    <div class="jumbotron jumbotron-fluid mt-5">
        <div class="container">
            <h1 class="display-4"><?php echo htmlspecialchars($topic['title']); ?></h1>
            <p class="lead"><?php echo htmlspecialchars($topic['text']); ?>
            </p>
            <hr class="my-4">

            <p><?php echo date_format($topicDate, 'd F Y'); ?> at <?php echo date_format($topicDate, 'H:i'); ?> by
                <strong><?php echo $topic['author_name']?></strong>
            </p>
        </div>
    </div>
</section>