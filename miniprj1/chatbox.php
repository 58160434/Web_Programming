<?php
include("db.php");
include("MsgClass.php");
$msg = new msg();
$msg->connect();
$sql= "SELECT * FROM msgchat";
$msg->query($sql);
while ($rows = mysqli_fetch_array($msg->result)){    
    echo "<span style='font-size:18px;color:#247AE4;'><b>" . $rows['msgchat_name'] ."</b></span>&nbsp;" .
    	 "<span style='font-size:18px;color:#FB5CC1;'>Say : </span>". 
    	 " <span style='font-size:18px;'>" . $rows['msgchat_msg'] ."</span><span style='font-size:16px;color:#8F8E8E;'>&nbsp;[ ". $rows['msgchat_date']." ]</span><br><hr>"; 
}
?>