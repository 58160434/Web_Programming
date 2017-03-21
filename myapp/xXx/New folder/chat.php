<?php
    include('db.php');
    include('MyPost.php');

    $db=new MyPost ();
    $db->connect();
    $db->query("select * from MyPost");

    while($row = mysqli_fetch_array($db->result)) {
        
        echo "<span style='font-size:16px;color:#2A8B92;'><b><i>".$row["MyPost_name"]."</i></b>&nbsp;</span>".
             "<span style='font-size:12px;color:#FF2525;'><b><i>"."Say :&nbsp;</i></b></span>" .
             " <span style='font-size:16px;'>" . $row["MyPost_text"]. "</span> ".
             "<span style='font-size:12px;color:#8F8E8E;'><i>&nbsp;".$row['MyPost_date'] ."</i></span><br>";
       
    }
?>