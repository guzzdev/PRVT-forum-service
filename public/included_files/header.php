<header>
<nav class="shadow-lg p-4 navbar navbar-expand-lg navbar-dark bg-primary row">
  <a class="navbar-brand col-sm-8" href="#">PRVTMSS</a>
    <div class="navbar-nav col-sm-4 row">
      <?php
      if($_SESSION['is_admin'] == 1){
        ?>
      <div class="nav-item col-sm-3 rounded-pill m-2 badge badge-success shadow-lg">
        <a class="nav-link"><?= $_SESSION['username']?> | admin</a>
      </div>
      <div class="nav-item col-sm-3 rounded-pill m-2 badge badge-primary shadow-lg">
        <a class="nav-link" href="logout.php">Log out</a>
      </div>
        <?php
      }
      else{
          ?>
      <div class="nav-item col-sm-3 rounded-pill m-2 badge badge-info shadow-lg">
        <a class="nav-link"><?= $_SESSION['username']?></a>
      </div>
      <div class="nav-item col-sm-3 rounded-pill m-2 badge badge-primary shadow-lg">
        <a class="nav-link" href="logout.php">Log out</a>
      </div>
      <?php
      }?>
    </div>
  </nav>
</header>
