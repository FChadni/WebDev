<?php
require __DIR__ . "/../vendor/autoload.php";

require '../lib/codebreaker.inc.php';

$controller = new Codebreaker\IndexController($codebreaker, $_POST);
//$redirect = $codebreaker->post($_POST);

//header("location: $redirect");
header("location:" . $controller->getRedirect());

exit;