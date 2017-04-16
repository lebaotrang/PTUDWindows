<?php
if(!isset($_SESSION['admin'])) die('Have no permision. Access deny!');
session_destroy();
redirect('index.php', 0);
?>