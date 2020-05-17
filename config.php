<?php 
session_start();
ob_start();

defined("DB_HOST") ? null : define("DB_HOST", "localhost");
defined("DB_USER") ? null : define("DB_USER", "root");
defined("DB_PASSWORD") ? null : define("DB_PASSWORD", "");
defined("DB_NAME") ? null : define("DB_NAME", "mondo");

$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

require_once("functions.php");













?>


