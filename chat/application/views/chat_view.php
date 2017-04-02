<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Baby Chat</title>
	<style type="text/css">
	::selection { background-color: #1AE100; color: white; }
	::-moz-selection { background-color: #1AE100; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
	<script
  src="https://code.jquery.com/jquery-2.2.3.min.js"
  integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo="
  crossorigin="anonymous"></script>
</head>
<body>
<script type="text/javascript">
$(document).ready(function(){
	function loadmsg() {
		$.get('<?php echo site_url();?>/api/getlast/10', function(data){
			$('#show').html(data);
		});
	}
	setInterval(loadmsg, 2000);
	$('button').click(function(){
		if($.trim($('#post_by').val())=="" || $.trim($('#msg').val())==""){
			alert('Please enter your nick name or message.');
		}else{
			formvalue = $('form').serialize();
			$.post('<?php echo site_url()?>/api/postmsg', formvalue, function(data){
				$('#msg').val("");
				$('#msg').focus();
			});
		}
	});
});
</script>
<div id="container">
	<h1>Baby Chat</h1>
	<div id="boby">
		<div id="show"></div>
		<form>
			Nick name
			<input type="text" name="post_by" id="post_by">
			<input type="text" name="msg" id="msg">
			<button type="button">Send</button>
		</form>	
	</div>
</div>
</body>
</html>