<?php 
include("db.php");

$GETid = addslashes($_GET['MyNotes_id']);
	$sql = "SELECT * FROM MyNotes WHERE MyNotes_id='$GETid'";
	$result = $conn->query($sql);
	$row = $result->fetch_array();
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
</head>
<body>

<div data-role="page" id="pageSeeNote">
  <div data-role="header" data-theme="b">
    <h1>Note</h1>
    <a href="index.php" data-transition="slide" data-direction="reverse" class="ui-btn ui-btn-left ui-corner-all ui-shadow ui-icon-back ui-btn-icon-left" data-rel="back">Back</a>
  </div>

  <div data-role="main" class="ui-content">
    <h2><center><?php echo "เรื่อง:   ".$row['MyNotes_title']; ?></center></h2>
    <p><center><?php echo "รายละเอียด:   ".$row['MyNotes_content']; ?></center></p>
    <p><center><?php echo "วันที่:   ".$row['MyNotes_date']; ?></center></p>
  </div>

  <div data-role="footer" data-position="fixed" data-theme="b">
    <h1>BY 58160434 | Sontaya Rungsaard</h1>
  </div>
  <script>
    $(document).on("pagecreate","#pageSeeNote",function(){
      $("body").on("swiperight",function(){
        window.location='index.php';
        });
    });
  </script>
</div> 

</body>
</html>