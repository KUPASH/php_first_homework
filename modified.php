<?php
ini_set('display_errors', true);
ini_set('display_startup_errors', true);
error_reporting(E_ALL);
?>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
    <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $file = file('tasks.txt');
            if(isset($file[$id])) {
                $line = $file[$id];
            }
        }
    ?>

    <form action="save.php">
        <input type="text" name="modified" value="<?=$line?>">
        <input type="hidden" name="id" value="<?=$id?>">
        <button type="submit">Save</button>
    </form>
</body>
</html>