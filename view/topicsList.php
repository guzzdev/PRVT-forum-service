<?php 
$title = "Topics List";
ob_start(); ?>
<section class="list-topic container-fluid">
    <h1 class="text-left container text-black-50">Topics</h1>
    <div class="container">
        <?php while($dataListTopics = $reqListTopics->fetch()){
            $topicsDate = date_create($dataListTopics['last_edit']);
            ?>

        <a href="topic.php?topic=<?php echo htmlspecialchars($dataListTopics['public_id']);?>">
            <div class="card mt-3">
                <div class="card-body">
                    <h5 class="card-title"><?php echo htmlspecialchars($dataListTopics['title']);?></h5>
                    <p class="card-text"><?php echo htmlspecialchars(substr($dataListTopics['text'], 0, 250));?>...
                    </p>
                    <p class="card-text">
                        <small class="text-muted"> <?php echo date_format($topicsDate, 'd F Y'); ?>
                            at
                            <?php echo date_format($topicsDate, 'H:i'); ?>
                        </small>
                    </p>
                </div>
            </div>
        </a>
        <?php
            }
            ?>
    </div>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center mt-3">
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Next</a>
            </li>
        </ul>
    </nav>

</section>
<?php $content = ob_get_clean(); 
require('template.php');
?>
