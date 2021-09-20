<?php
require 'format.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>welcome</title>
    <link href="style.css" type="text/css" rel="stylesheet" />
</head>
<body>

<?php echo present_header("Stalking the Wumpus"); ?>

<div class = "article">
    <div class="image">
        <figure>
            <img src="./cave-evil-cat.png" width="600" height="325" alt="picture of cave">
        </figure>
    </div>
    <div class = "instr">
        <p>
            <span class = "x">Welcome to</span>
            <span class = "y">Stalking the Wumpus</span>
        </p>
    </div>

    <div class="wel_page">
        <p><a href="instructions.php">Instructions</a></p>
        <p><a href="game.php">Start Game</a></p>
    </div>
</div>
<footer>
</footer>
</body>
</html>