<?php
include('db.php');
include('chatClass.php');

if(isset($_POST['name'])&&isset($_POST['text'])){
    $db=new chatClass();
    $db->connect();
    $db->insert($_POST['name'],$_POST['text']);
    echo 'sss';
}
else{
    echo 'not';
 }
?>