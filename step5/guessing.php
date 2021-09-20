<?php
require __DIR__ . '/lib/guessing.inc.php';
$view = new Guessing\GuessingView($guessing);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gussing Game</title>
    <link href="style.css" type="text/css" rel="stylesheet"/>
</head>
<body>
    <?php echo $view->present(); ?>
</body>
</html>
