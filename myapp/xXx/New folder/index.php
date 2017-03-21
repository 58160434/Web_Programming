<?php
session_start ();
function loginForm() {
    echo '
    <h1>Realtime Chat</h1>
   <div id="loginform">
   <form action="index.php" method="post">
       <h4>Please enter your name and E-mail to continue:</h4>
       <table align="center">
           <tr>
               <td><img src="msn.png" style="width: 80px;height: 80px;"></td>
               <td><input type="text" name="name" id="name" placeholder="Username"/><br><br>
                   <input type="email" name="email" id="email" placeholder="name@example.com"/></td>
           </tr>
           <tr>
               <td></td>
               <td align="center"><input type="submit" name="enter" id="enter" value="Sign in" /></td>
           </tr>
       </table>
   </form>
   </div>
   ';
}
 
if (isset ( $_POST ['enter'] )) {
    if ($_POST ['name'] != "") {
        $_SESSION ['name'] = stripslashes ( htmlspecialchars ( $_POST ['name'] ) );
    } else {
        echo '<span class="error">Please type in a name and e-mail.</span>';
    }
}
 
if (isset ( $_GET ['logout'] )) {
    session_destroy ();
    header ( "Location: index.php" ); // Redirect the user
}
 
?>
<html>
<head>
    <meta charset='UTF-8'>
    <link rel="stylesheet" type='text/css' href='mystyle.css'>
</head>
<body>
<?php

if($_GET['logout']){//logout
include('db.php');
include('MyPost.php');
    $db=new MyPost ();
    $db->connect();
    $db->logout($_SESSION['name']);
    $db->close_connect();
    session_destroy();
    header("Location: index.php");
}
if(isset($_POST['submitname'])){ //check login button
    if(isset($_POST['name'])){
        $_SESSION['name']=$_POST['name'];
        
    }
}
if (! isset ( $_SESSION ['name'] )) {//login page 
        loginForm ();
    } else {
?>

 <div id="wrapper">
    <div id="menu">
        <p class="welcome"><b>Welcome:&nbsp;&nbsp;</b><b style="color: #17B61B;font-size: 14px;"><?php echo $_SESSION['name']; ?></b></p>
        <p class="logout">
            <a id="exit" href="#"><button type="button">Quit</button></a>
        </p>
        <div style="clear: both"></div>
    </div>
    <div id="chatbox"></div>
    <div id="chatbox" style="width: 160px">
    <div id='listname'></div>
    </div>
        <input name="detil" type="text" id="detil" size="63" onkeyup="count()" maxlength="100" placeholder="Send Message..."/>
        <button type='button' id="send" onclick="detilsend()">send</button><br>
        <sub id='counttxt'>You can send message 100 character</sub>
</div>
       
<script>
    var higthchatbox=document.getElementById('chatbox').clientHeight;
    var send=document.getElementById('detil');
    send.addEventListener("keydown",function (e){
        if(e.keyCode==13){
            detilsend();
        }
    });
    
    function count() {
        var l=document.getElementById('detil').value.length;
                 document.getElementById('counttxt').innerHTML="You can send message "+(100-l)+" character";
    }
    
    function autoscroll(){
        document.getElementById('chatbox').scrollTop=document.getElementById('chatbox').scrollHeight;
    }
    
    function detilsend() {
        var txt = "";
        txt += document.getElementById('detil').value;
        document.getElementById('detil').value="";
        insertData(txt);
    }

    function insertData(txt) {
        var ajax = new XMLHttpRequest();
        ajax.onreadystatechange = function() {
            if (ajax.readyState == 4 && ajax.status == 200) {
                document.getElementById('s1').innerHTML = ajax.responseText;
            }
        }
        ajax.open('POST', 'insert.php', true);
        ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        ajax.send("name=<?php echo $_SESSION['name']; ?>&detil=" + txt);
    }
    
    function showlistname() {
        var ajax = new XMLHttpRequest();
        ajax.onreadystatechange = function() {
            if (ajax.readyState == 4 && ajax.status == 200) {
                document.getElementById('listname').innerHTML = ajax.responseText;
            }
        }
        ajax.open('POST', 'listname.php', true);
        ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        ajax.send("name=<?php echo $_SESSION['name']; ?>");
    }

    function ajax() {
        var ajax = new XMLHttpRequest();
        ajax.onreadystatechange = function() {
            if (ajax.readyState == 4 && ajax.status == 200) {
                document.getElementById('chatbox').innerHTML = ajax.responseText;
                autoscroll();
            }
        }
        ajax.open('POST', 'chat.php', true);
        ajax.send();
    }
    setInterval(ajax,1000);
    setInterval(showlistname,1000);
</script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
<script type="text/javascript">
//jQuery Document
$(document).ready(function(){
    //If user wants to end session
    $("#exit").click(function(){
        var exit = confirm("Are you sure you want to end the session?");
        if(exit==true){window.location = 'index.php?logout=true';}     
    });
});
</script>
<?php
    }
?>
</body>

</html>