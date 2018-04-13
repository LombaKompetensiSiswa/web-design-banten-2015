<?php
require_once 'inc/init.php';

if(!$_SESSION['uid']) die ('Harap Login terlebih Dahulu!');

session_destroy();

header('Location: index.php');

?>