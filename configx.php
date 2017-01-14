<?php
/*$url = "http://locolhost/reg";
$host = "localhost";
$user = "root";
$pass = "";
$db = "test";*/
/*$connecDB = mysqli_connect($host, $user,$pass,$db)or die('could not connect to database');*/

$host = getenv("MYSQL_SERVICE_HOST");
$dbport = getenv("MYSQL_SERVICE_PORT");
$user = getenv("MYSQL_USER");
$pass = getenv("MYSQL_PASSWORD");
$db = getenv("MYSQL_DATABASE");
?>
