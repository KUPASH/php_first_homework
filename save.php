<?php
ini_set('display_errors', true);
ini_set('display_startup_errors', true);
error_reporting(E_ALL);

$newline = $_GET['modified'];
$id = $_GET['id'];
$lines = [];
$handle = fopen('tasks.txt','r');
while (($line = fgets($handle)) !== false) {
    $lines[] = $line;
}
$handle = fopen('tasks.txt', 'w');
$counter = 0;
foreach ($lines as $line) {
    if ($counter != $id) {
        fputs($handle, $line);
    } else {
        fputs($handle, $newline . PHP_EOL);
    }
    $counter++;
}
fclose($handle);


header('Location: index.php');


