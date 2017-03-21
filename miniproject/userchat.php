<?php
    include('db.php');
    include('chatClass.php');

    $db=new chatClass();
    $db->connect();
    $db->query("select chat_name from chat where chat_status='1' and chat_name!='".$_POST['name']."' group by chat_name");
    echo '<center style="color:#18D60A;font-size:16px;"><b>User Online</b></center><br>';
    echo '<center>*'.$_POST['name']."*<center>";
    while($row = mysqli_fetch_array($db->result)) {
        
        echo   $row["chat_name"]."<br>";
        
    }

?>