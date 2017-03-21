<?php
include("db.php");
include("UserClass.php");

$user = new user();
$user->connect();
$sql= "SELECT * FROM userchat";
$user->query($sql);

echo "<center><span style='font-size:16px;color:#1CC514;'>User Online</span></center><br>";
while ($rows = mysqli_fetch_array($user->result)){
	echo "<center>".$rows['userchat_name'] ."</center><br>"; 
}
?>