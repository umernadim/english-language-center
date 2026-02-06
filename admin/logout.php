<?php
session_start();

$_SESSION = array();  

session_destroy();

header("Location: http://localhost/php_learning/final-web/admin/login.php");
exit();  
?>
