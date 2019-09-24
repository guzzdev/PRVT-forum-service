<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center mt-3">
        <?php
        $prevPage = intval($_GET['page'])-1;
        $thisPage = intval($_GET['page']);
        $nextPage = intval($_GET['page'])+1;
        ?>
        <li class="page-item"><a class="page-link" href="#"><?= $prevPage?></a></li>
        <li class="page-item"><a class="page-link" href="#"><?= $thisPage?></a></li>
        <li class="page-item"><a class="page-link" href="#"><?= $nextPage?></a></li>
    </ul>
</nav>
