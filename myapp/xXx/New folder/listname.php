<?php
    include('db.php');
    include('MyPost.php');

    $db=new MyPost ();
    $db->connect();
    $db->query("select MyPost_name from MyPost where MyPost_status='1' and MyPost_name!='".$_POST['name']."' group by MyPost_name");
    echo '<center>Listname</center><br>';
    echo '<center>*'.$_POST['name']."*<center>";

    //"id: " . $row["Post_id"]. 
    // output data of each row
    while($row = mysqli_fetch_array($db->result)) {
        
        echo   $row["MyPost_name"]."<br>";
        
    }

?>