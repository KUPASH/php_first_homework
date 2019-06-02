<?php

$update_string = $_GET['id'];
$file = file('tasks.txt');
str_replace($_GET['update'], $_GET['task'], $update_string );
file_put_contents('tasks.txt', implode("", $file) );
header('Location: index.php');