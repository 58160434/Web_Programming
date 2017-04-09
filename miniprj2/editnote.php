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
<!--pang Edit Notes-->
<div data-role="page" id="pageEditNote">
  <div data-role="header" data-theme="b">
    <h1>EditNote</h1>
    <!-- <a href="index.php" class="ui-btn ui-btn-left ui-corner-all ui-shadow ui-icon-back ui-btn-icon-left" data-rel="back">Go Back</a> -->
    <a data-rel="back" data-transition="slide" data-direction="reverse" data-role="button" data-icon="back">Back</a>

    <a class="ui-btn ui-btn-right ui-corner-all ui-shadow ui-icon-delete ui-btn-icon-left" id="del">Delete</a>
  </div>

  <div data-role="main" class="ui-content">
    <form method="post" action="saveedit.php">
      <div class="ui-field-contain" id="formEditNote">
        <label>เรื่อง:</label>
        <INPUT TYPE="hidden" name="id" id="id" VALUE="<?php echo $row['MyNotes_id']; ?>">
        <input type="text" name="title" id="title" value="<?php echo $row['MyNotes_title']; ?>">
        <label>รายละเอียด:</label>
        <textarea name="content" id="content"><?php echo $row['MyNotes_content']; ?></textarea>
      </div>
      <input type="submit" value="Edit" data-theme="b">
    </form>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script>
    $("#del").on("click",function(event){
      event.stopPropagation();
      if(confirm("Do you want to delete?")) {
        this.click;
        window.location.replace("deletenote.php?MyNotes_id=<?php echo $row['MyNotes_id']; ?>");
      }     
      event.preventDefault();
    });
  </script>
  </div>

  <div data-role="footer" data-position="fixed" data-theme="b">
    <h1>BY 58160434 | Sontaya Rungsaard</h1>
  </div>
  <!--<script>
    $(document).on("pagecreate","#pageEditNote",function(){
      $("#pageEditNote").on("swiperight",function(){
        window.location='index.php';
      });
      $('#formEditNote').on('swipeleft swiperight', function(e){
        e.stopPropagation();
        e.preventDefault();
      });
    });
  </script>-->
</div>


</body>
</html>