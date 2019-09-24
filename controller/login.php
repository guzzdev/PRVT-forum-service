<?php
    require 'model/ConnectionManager.php';
    $newuser = new ConnectionManager();

    if($newuser->is_connected()){
      header('Location: topic.php');
    exit;
    }

    if (isset($_POST['register-form']) AND !empty($_POST['register_username']) AND !empty($_POST['register_password']) AND !empty($_POST['register_password_confirm'])) {
      $newuser->signUp($_POST['register_username'], $_POST['register_password'], $_POST['register_password_confirm']);
    }
    elseif (isset($_POST['login-form'])) {
      $newuser->logIn($_POST['login_username'], $_POST['login_password']);
    }

    require 'view/viewIndex.php';
