<!-- Comment START-->
<div id="<?php echo htmlspecialchars($comment['id_public']);?>" class="card W-100 mb-3">
    <div class="card-header">
        <?php echo date_format($topicDate, 'd F Y'); ?> at <?php echo date_format($topicDate, 'H:i'); ?>
    </div>
    <div class="card-body">
        <blockquote class="blockquote mb-0">
            <p><?php echo htmlspecialchars($comment['text']);?></p>
            <footer class="blockquote-footer">by <cite><?php echo $comment['author_name'];?></cite>
            </footer>
        </blockquote>
    </div>
</div>
<!-- Comment END-->