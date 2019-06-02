<?php

$num_string = $_GET['id'];
$file = file('tasks.txt');
unset($file[$num_string]);
file_put_contents('tasks.txt', implode("", $file) );
header('Location: index.php');
