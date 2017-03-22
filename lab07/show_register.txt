<?php
include("db.php");
$query = "SELECT * FROM register JOIN provinces WHERE register.Register_provinces=provinces.PROVINCE_ID";
$result = $conn->query($query);
if (!$result) die($conn->error);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show Register</title>
</head>
<body bgcolor="#b5ff6a">
<h3 align="center">รายชื่อผู้ลงทะเบียน</h3>
<table border="1" align="center" bgcolor="#ffff80">
    <tr align="center">
        <th bgcolor="#ffff80">#</th>
        <th bgcolor="#ffff80">ชื่อ-นามสกุล</th>
        <th bgcolor="#ffff80">อีเมล์</th>
        <th bgcolor="#ffff80">เพศ</th>
        <th bgcolor="#ffff80">ความสนใจ</th>
        <th bgcolor="#ffff80">ที่อยู่</th>
        <th bgcolor="#ffff80">จังหวัด</th>
    </tr>
    <?php while ($row = $result->fetch_object()){ ?>
    <tr align="center"> 
        <td bgcolor="#ffffff"><?php echo $row->Register_ID; ?></td>
        <td bgcolor="#ffffff"><?php echo $row->Register_name; ?></td>
        <td bgcolor="#ffffff"><?php echo $row->Register_email; ?></td>
        <td bgcolor="#ffffff"><?php echo $row->Register_sex; ?></td>
        <td bgcolor="#ffffff"><?php echo $row->Register_intr1; ?>
                <?php if($row->Register_intr1 != ''){
                    echo "<br>";
                } ?>
            <?php echo $row->Register_intr2; ?></td>
        <td bgcolor="#ffffff"><?php echo $row->Register_address; ?></td>
        <td bgcolor="#ffffff"><?php echo $row->PROVINCE_NAME; ?></td>
    </tr>
    <?php } ?>
</table>
<br>
<center><button onClick="ReFrom()">ลงทะเบียนที่นี่</button></center>
</body>
<script>
function ReFrom(){
    window.location.replace("http://angsila.cs.buu.ac.th/~58160434/887371/lab07/register_form.php");
}
</script>
</html>