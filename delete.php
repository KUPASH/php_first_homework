<?php
ini_set('display_errors', true);
ini_set('display_startup_errors', true);
error_reporting(E_ALL);

if (isset($_GET['id'])) {
    $num_string = $_GET['id'];
    $file = file('tasks.txt');
    if (isset($file[$num_string])) {
        unset($file[$num_string]);
    }
    file_put_contents('tasks.txt', implode("", $file) );
}

header('Location: index.php');
