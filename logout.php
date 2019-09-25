<?php
session_start();
unset($_SESSION['connected']);
unset($_SESSION['username']);
unset($_SESSION['public_id']);

header('Location: index.php');

?>
