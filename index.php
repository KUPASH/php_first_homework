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
    if ($_GET['task']) {
        $handle = fopen('tasks.txt', 'a');
        fputs($handle, $_GET['task'] . PHP_EOL);
        fclose($handle);
    }
    $handle = fopen('tasks.txt', 'r');
    echo '<table border="1">';
    $counter = 1;
    while(($b = fgets($handle)) !== false) {
        echo '<tr><td>'.$b.'</td>
                  <td><a href="redirect.php?id='.$counter++.'">X</a></td></tr>';

    }
    echo '</table>';
    fclose($handle);

    $num_string = 1;
    $file = file('tasks.txt');
    unset($file[$num_string]);
    file_put_contents('tasks.txt', implode("", $file) );




    ?>
</body>
</html>