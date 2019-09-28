<?php
session_start();
unset($_SESSION['connected']);
unset($_SESSION['username']);
unset($_SESSION['public_id']);
unset($_SESSION['is_admin']);

header('Location: index.php');

?>
