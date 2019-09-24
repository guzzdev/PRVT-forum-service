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
                    <h5 class="card-title"><?= htmlspecialchars($dataListTopics['title']). ":". $dataListTopics['id']; ?></h5>
                    <p class="card-text"><?php echo htmlspecialchars(substr($dataListTopics['text'], 0, 250));?>...
                    </p>
                    <p class="card-text">
                        <small class="text-muted"> <?php echo date_format($topicsDate, 'd F Y'); ?>
                            at
                            <?php echo date_format($topicsDate, 'H:i');?>
                            by
                            <?= $dataListTopics['author_name'];?>
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
          <?php
          $prevPage = intval($page)-1;
          $thisPage = intval($page);
          $nextPage = intval($page)+1;
          if($prevPage!=0)
          {
            echo '<li class="page-item"><a class="page-link" href="topic.php?page='.$prevPage.'">'.$prevPage.'</a></li>';
          }
          ?>
          <li class="page-item"><a class="page-link" href="topic.php?page=<?= $thisPage?>"><?= $thisPage?></a></li>
          <li class="page-item"><a class="page-link" href="topic.php?page=<?= $nextPage?>"><?= $nextPage?></a></li>
      </ul>
    </nav>

</section>
<?php require_once('view/formTopic.php');?>
<?php $content = ob_get_clean();
require('view/templateForum.php');
?>
