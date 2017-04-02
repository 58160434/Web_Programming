<?php
$link = mysql_connect('localhost', 'it58160434', '0896959711');
mysql_query("SET NAMES UTF8");
mysql_select_db('it58160434', $link);

// insert new todo
if($_POST['topic'] != ''){
    $start = date('Y-m-d H:i:s');
    $topic = addslashes($_POST['topic']);
    $sql = "INSERT INTO todo (start, topic, status) VALUES ('$start', '$topic', 0)";   
}
// update todo
if($_POST['id'] != ''){
    $finish = date('Y-m-d H:i:s');
    $id = addslashes($_POST['id']);
    $sql = "SELECT status FROM todo WHERE id='$id'";
    $result = mysql_query($sql);
    $show = mysql_fetch_object($result);

    if ($show->status == 0) {
        $sql = "UPDATE todo SET status='1', finish='$finish' WHERE id='$id'";
    }else{
        $sql = "UPDATE todo SET status='0' WHERE id='$id'";
    }
    
}
// delete todo
if($_POST['del'] != ''){
    $id = addslashes($_POST['del']);
    $sql = "DELETE FROM todo WHERE id='$id'";
}

mysql_query($sql);

// get data back
$sql = "SELECT *
        FROM todo
        ORDER BY status, id desc
        ";
$result = mysql_query($sql, $link);
$script = "<script>";
$html = "<ul>";
while($obj = mysql_fetch_object($result)){
    $script.="$(document).ready(function() {
                $('#$obj->id').click(function(event){
                    if($('#$obj->id').prop('checked') == true){
                        $.ajax({
                            url: 'add_new_todo.php',
                            type: 'POST',
                            data: 'id='+$(this).val(),
                            success: function(data){
                                $('#disp').html(data);
                            },
                            error: function(data){
                                $('#disp').html('<h3>Error!</h3?>');
                            }
                        });
                    }
                });
                $('.$obj->id').click(function(event){
                    $.ajax({
                        url: 'add_new_todo.php',
                        type: 'POST',
                        data: 'del='+$(this).val(),
                        success: function(data){
                            $('#disp').html(data);
                        },
                        error: function(data){
                            $('#disp').html('<h3>Error!</h3?>');
                       }
                    });
                });
            });";
    if($obj->status==0){
        $html.="<input type='checkbox' class='checkbox' id='$obj->id' value='$obj->id' />".$obj->topic." ";
        $html.="<font color='#009900' size='2'>[".$obj->start."]</font>";
        $html.="&nbsp;<button class='$obj->id' value='$obj->id'>Delete</button>";
        $html.="<br>";
    }else{
        $html.="<s><input type='checkbox' class='checkbox' id='$obj->id' value='$obj->id' />".$obj->topic." ";
        $html.="<font color='#009900' size='2'>[".$obj->finish."]</font></s>";
        $html.="&nbsp;<button class='$obj->id' value='$obj->id'>Delete</button>";
        $html.="<br>";
    }
}
$html.="</ul>";
$script.= "</script>";
echo $html;
echo $script;

?>