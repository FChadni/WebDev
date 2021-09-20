<?php
require 'lib/codebreaker.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="codebreaker.css" type="text/css" rel="stylesheet"/>
    <title>Codebreaker</title>
</head>
<body>
<form id="gameform" action="post/codebreaker.php" method="POST">
    <fieldset>
        <h1><?php echo $codebreaker->getUser() ?>'s Codebreaker</h1>
        <h2>Encoded:</h2>
        <p class="code"><?php echo $codebreaker->getEncoded() ?></p>
        <h2>Decoded:</h2>
        <p class="code"><?php echo $codebreaker->getPlaintext() ?></p>

        <table class="game">
            <p class="end">You gave up!</p>
            <p>
                <input type="submit" name="newgame" value="New Game">
            </p>
</body>
</html>
