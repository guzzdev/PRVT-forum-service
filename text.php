<?php
    require 'model/ConnectionManager.php';
    $newuser = new ConnectionManager();

    $newuser->signUp("<a>bonsoir</a>","123abc");