<a href="topic.php?topic=<?php echo htmlspecialchars($topics['public_id']);?>">
    <div class="card mt-3">
        <div class="card-body">
            <h5 class="card-title"><?php echo htmlspecialchars($topics['title']);?></h5>
            <p class="card-text"><?php echo htmlspecialchars(substr($topics['text'], 0, 250));?>...</p>
            <p class="card-text"><small class="text-muted"> <?php echo date_format($topicsDate, 'd F Y'); ?> at
                    <?php echo date_format($topicsDate, 'H:i'); ?>
                </small></p>
        </div>
    </div>
</a>