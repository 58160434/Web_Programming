<?php
include("db.php");
include("UserClass.php");
if(isset($_POST['logout'])){
  $user = new user();
  $user->connect();
  $user->delete($_POST['userid']);
}
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Login Form</title>
</head>
<body>

<form action="chatpage.php" method="post">
  <h4> Login </h4>
  <input type="text" name="name" id="name" placeholder="Enter Username"/>
  <input type="email" name="email" id="email" placeholder="Enter E-mail"/>
  <input type="submit" name="enter" id="enter" value="Login"/>
</form>
    
</body>
</html>
