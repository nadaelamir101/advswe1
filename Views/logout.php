<?php

session_start(); 

$_SESSION = array();


session_destroy();


header("Location: /r-n/index.php");
exit;
?>