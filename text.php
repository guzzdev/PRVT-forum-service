<?php
//test controller de index.php
    require 'model/ConnectionManager.php';
    $newuser = new ConnectionManager();

    $newuser->signUp("jesuisguzz","123abc");
    $newuser->logIn("jesuisguzz", "123abc");

    require 'view/index.php';
