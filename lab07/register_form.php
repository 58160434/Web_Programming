<?php
include("db.php");
$query = "SELECT * FROM provinces";
$result = $conn->query($query);
if (!$result) die($conn->error);
?>
<!DOCTYPE html>
<html lang= "en">
<head>
	<meta charset="utf-8">
	<title>Form Validation</title>
</head>
<body bgcolor="#b5ff6a">
	<h3>แบบฟอร์มลงทะเบียน</h3>
	<form action="dopost.php" method="post" class="a"/>ชื่อ-นามสกุล: <br/>
	<input type="text" class="text" name="name" id="name"/><br/>อีเมล: <br/>
	<input type="text" class="text" name="email" id="email"><br/>
	เพศ: <br/>
	<input type="radio" class="radio" name="sex" value="ชาย" id="sexM"/>ชาย
	<input type="radio" class="radio" name="sex" value="หญิง" id="sexF"/>หญิง
	<br/>
	ความสนใจ: <br/>
	<input type="checkbox" class="checkbox" name="intr1" value="เรียน" id="intr1"/>เรียน
	<input type="checkbox" class="checkbox" name="intr2" value="เกมส์" id="intr2"/>เกมส์
	<br/>
	ที่อยู่: <br/>
	<textarea class="text" name="address" id="address" rows="4" cols="50"></textarea>
	<br/>
	จังหวัด: <br/>
	<select name="province" id="province">
		<option value="">---เลือกจังหวัด---</option>
		<?php while ($row = $result->fetch_object()){ ?>
		<option value="<?php echo $row->PROVINCE_ID; ?>"><?php echo $row->PROVINCE_NAME; ?></option>
		<?php } ?>
		</select><br/>

		<br/><br/>
	<input type="submit" id="submit" value="Submit" name="submit"/>
	</form>
	<p><a href="http://angsila.cs.buu.ac.th/~58160434/887371/lab07/er.png">ER Diagram</a></p>
	<p><a href="http://angsila.cs.buu.ac.th/~58160434/887371/lab07/register_form.txt">Source Code [register_form.php]</a></p>
	<p><a href="http://angsila.cs.buu.ac.th/~58160434/887371/lab07/dopost.txt">Source Code [dopost.php]</a></p>
	<p><a href="http://angsila.cs.buu.ac.th/~58160434/887371/lab07/show_register.txt">Source Code [show_register.php]</a></p>
	<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script>
		$('#submit').on('click',function(event) {
			var valid = true,
			errorMessage = "";

			if($('#name').val() == ''){
				errorMessage = "โปรดป้อน ชื่อ-นามสกุล ของคุณ\n";
				valid = false;
			}
			if($('#email').val() == ''){
				errorMessage += "โปรดป้อน email ของคุณ\n"
				valid = false;
			}else if (!(($('#email').val().indexOf(".") > 0) && ($('#email').val().indexOf("@") > 0)) || /[^a-zA-Z0-9.@_-]/.test($('#email').val())) {
				errorMessage +="โปรดป้อน email ให้ถูกต้อง\n";
				valid =false;
			}
			if(!$('#sexM').prop("checked") && !$('#sexF').prop("checked")){
				errorMessage += "โปรดป้อน เพศ ของคุณ\n"
				valid = false;
			}
			if(!$('#intr1').prop("checked") && !$('#intr2').prop("checked")){
				errorMessage += "โปรดป้อน ความสนใจ(สามารถเลือกได้มากกว่า1อย่าง) ของคุณ\n"
				valid = false;
			}
			if($('#address').val() == ''){
				errorMessage += "โปรดป้อน ที่อยู่ ของคุณ\n"
				valid = false;
			}
			if($('#province').val() == ''){
				errorMessage += "โปรดป้อน จังหวัด ของคุณ\n"
				valid = false;
			}
			if( !valid && errorMessage.length > 0){
				alert(errorMessage);
				event.preventDefault();
			}
		});
	</script>
</body>
</html>