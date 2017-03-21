<?php
include("db.php");
include("UserClass.php");
include("MsgClass.php");

session_start();

$iduser = $_POST [name];

if (isset ( $_POST ['enter'] )) {
    if ($_POST ['name'] != "") {
        $_SESSION ['name'] = stripslashes ( htmlspecialchars ( $_POST ['name'] ) );
    }
}
if(isset($_POST['enter'])){
	$user = new user();
	$user->connect();
	$user->userchat_name = $_POST['name'];
	$user->userchatemail = $_POST['email'];
	$user->online = 1;
	$user->insert();

	$user = new user();
	$user->connect();
	$sql= "SELECT * FROM userchat WHERE userchat_name LIKE '" . $_POST['name'] ."'";
	$user->query($sql);
	$rows = mysqli_fetch_array($user->result);
}
if(isset($_POST['send'])){
	$msg = new msg();
	$msg->connect();
	$msg->msgchat_msg = $_POST['msg'];
	$msg->msgchat_name = $_POST['user'];
	$msg->msgchat_date = $_POST['datetime'];
	$msg->insert();

	$user = new user();
	$user->connect();
	$sql= "SELECT * FROM userchat WHERE userchat_name LIKE '" . $_POST['user'] ."'";
	$user->query($sql);
	$rows = mysqli_fetch_array($user->result);
}

?>
<html>
<head>
	<title> Realtime Chat </title>	
	<meta charset='UTF-8'>
	<link rel="stylesheet" type='text/css' href='mystyle.css'>
</head>
<body>
<body bgcolor="#2c3e50">
 <div id="wrapper">
    <div id="menu">
        <p class="welcome"><b>Welcome:&nbsp;&nbsp;</b><b style="color: #17B61B;font-size: 16px;"><?php echo $_SESSION['name']; ?></b></p>
    <form action='index.php' method='POST'>
    	<p class="logout"><input type="hidden" name="userid" value= '<?php echo $rows['userchat_id']; ?>' >
		<input type="submit" name="logout" value= "logout"/ >
		</p>	
	</form>
    <div style="clear: both"></div>
    </div>
    <div id="box"><div id='showChat'>
    </div></div>
    <div id="box" style="width: 160px"><div id='showUser'></div></div>
    <form action='chatpage.php' method='POST'>
        <input type="hidden" name="user" value= '<?php echo $_SESSION['name']; ?>' >
			<input type="hidden" name="datetime" value='<?php echo date("Y-m-d H:i:s"); ?>' >
			<input type="text" name="msg" size="63" " placeholder="Send Message..."/>
  			<input type="submit" name="send" value="Send"/>
	</form>   
</div>
	<script>
	function loadchat() {
		var xmlhttp1;
		xmlhttp1 = new XMLHttpRequest;
		xmlhttp1.onreadystatechange = function(){
		if (xmlhttp1.readyState == 4 &&  xmlhttp1.status == 200){
			document.getElementById('showChat').innerHTML = xmlhttp1.responseText;
			document.getElementById('box').scrollTop=document.getElementById('box').scrollHeight;
		}
	}
	xmlhttp1.open("POST", "chatbox.php", true);
	xmlhttp1.send();
	}
	setInterval(loadchat,2000);

	function loaduser() {
		var xmlhttp1;
		xmlhttp1 = new XMLHttpRequest;
		xmlhttp1.onreadystatechange = function(){
		if (xmlhttp1.readyState == 4 &&  xmlhttp1.status == 200){
			document.getElementById('showUser').innerHTML = xmlhttp1.responseText;
		}
	}
	xmlhttp1.open("POST", "userbox.php", true);
	xmlhttp1.send();
	}
	setInterval(loaduser,2000);
	</script>
</body>
</html>