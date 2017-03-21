<?php
include('db.php');
include('MyPost.php');

if(isset($_POST['name'])&&isset($_POST['detil'])){
    $db=new MyPost ();
    $db->connect();
    $db->insert($_POST['name'],$_POST['detil']);
    echo 'sss';
}
else{
    echo 'not';
 }
?>