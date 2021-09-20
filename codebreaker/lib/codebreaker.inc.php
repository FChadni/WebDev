<?php
require __DIR__ . "/../vendor/autoload.php";
session_start();
define("CODEBREAKER_SESSION",'codebreaker');

if(!isset($_SESSION[CODEBREAKER_SESSION])) {
    $_SESSION[CODEBREAKER_SESSION] = new Codebreaker\Codebreaker();
}

$codebreaker = $_SESSION[CODEBREAKER_SESSION];
