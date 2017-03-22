<meta charset="utf-8" />
<?php
// cennect database
$host = "localhost";
$user = "it58160434";
$passwd = "0896959711";
$dbname = "it58160434";
$conn = new mysqli($host, $user, $passwd, $dbname);
$conn->query('SET NAMES UTF8');
if ($conn_error) die($conn->connect_error);
?>