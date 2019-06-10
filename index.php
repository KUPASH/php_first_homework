<?php
ini_set('display_errors', true);
ini_set('display_startup_errors', true);
error_reporting(E_ALL);
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>First PHP</title>
    <link rel="stylesheet" href="css/main.css">
</head>
    <?php
    $hour = date('H');
    if ($hour >= 0 && $hour <=6) {
        $class = 'dark';
    } else {
        $class = 'light';
    }
    ?>
<body class="<?=$class?>">
    <form>
        New task: <input name="task">
        <button type="submit">Create</button>
    </form>
    <?
    if (isset($_GET['task'])) {
        $handle = fopen('tasks.txt', 'a');
        fputs($handle, $_GET['task'] . PHP_EOL);
        fclose($handle);
    }
    $handle = fopen('tasks.txt', 'r');
    echo '<table border="1">';
    $counter = 0;
    while(($line = fgets($handle)) !== false) {
        echo '<tr><td>'.$line.'</td>
                  <td><a href="delete.php?id='.$counter.'">X</a></td>
                  <td><a href="modified.php?id='.$counter.'">Modified</a></td></tr>';
        $counter ++;
    }
    echo '</table>';
    fclose($handle);
    ?>

</body>
</html>