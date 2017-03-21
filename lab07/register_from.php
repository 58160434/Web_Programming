<!DOCTYPE html>
<html lang= "en">
<head>
	<meta charset="utf-8">
	<title>Form Validation</title>
</head>
<body>
	<h3>แบบฟอร์มลงทะเบียน</h3>
	<form action="dopost.php" method="post" class="a"/>ชื่อ-นามสกุล: <br/>
	<input type="text" class="text" name="name" id="name"/><br/>อีเมล: <br/>
	<input type="text" class="text" name="email" id="email"><br/>
	เพศ: <br/>
	<input type="radio" class="radio" name="sex" value="M"/>ชาย
	<input type="radio" class="radio" name="sex" value="F"/>หญิง
	<br/>
	ความสนใจ: <br/>
	<input type="checkbox" class="checkbox" name="intr1" id="tntr1"/>เรียน
	<input type="checkbox" class="checkbox" name="intr2" id="tntr2"/>เกมส์
	<br/>
	ที่อยู่: <br/>
	<textarea class="text" name="address" id="address" rows="4" cols="50"></textarea>
	<br/>
	จังหวัด: <br/>
	<select name="province" id="province">
		<option value="">---เลือกจังหวัด---</option>
		<option value="1">กรุงเทพมหานคร</option>
		<option value="2">ชลบุรี</option>
		</select><br/>

		<br/><br/>
	<input type="submit" id="submit" value="Submit" name="submit"/>
	</form>
	<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script>
		$('#submit').on('click',function(event) {
			var valid = true,
			errorMessage = "";

			if($('#name').val() == ''){
				errorMessage = "โปรดป้อนชื่อ-นามสกุล \n";
				valid = false;
			}
			if($('#address').val() == ''){
				errorMessage += "โปรดป้อนที่อยู่\n"
				valid = false;
			}
			if($('#email').val() == ''){
				errorMessage += "โปรดป้อน email\n"
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