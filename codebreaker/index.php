<?php
//require 'lib/codebreaker.inc.php';
require_once __DIR__ . '/lib/codebreaker.inc.php';
require_once __DIR__ . '/vendor/autoload.php';

$view = new Codebreaker\IndexView($codebreaker);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Codebreaker Signin</title>
  <link href="codebreaker.css" type="text/css" rel="stylesheet"/>
</head>
<body>
<?php echo $view->present(); ?>

<!--<form id="signin" action="post/index.php" method="POST">-->
<!--    <fieldset>-->
<!--        <p><img src="images/banner.png" width="521" height="346" alt="Codebreaker Banner"></p>-->
<!--        <p>Welcome to Codebreaker!</p>-->
<!--        <p><label for="name">Your Name: </label>-->
<!--            <input type="text" name="name" id="name"></p>-->
<!--        <p><input type="submit" value="Start Game"></p>-->
<!--    </fieldset>-->
<!--</form>-->
</body>
</html>