
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
		$('#intr2').on('click',function(event) {
			if($('#intr2').prop("checked")){
				alert("dsdsds");
			}
		});
	</script>
</body>
</html>