<?php
$link = mysql_connect('localhost', 'it58160434', '0896959711');
mysql_query("SET NAMES UTF8");
mysql_select_db('it58160434' $link);

// insert new todo
$start = date('Y-m-d H:i:s');
$topic = addslashes($_POST['topic']);
$sql = "INSERT INTO todo (start, topic, status) VALUES ('$start', '$topic', 0)";

?>