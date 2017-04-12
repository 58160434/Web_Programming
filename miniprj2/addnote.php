<?php
include("db.php");
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
<!--pang Add Notes-->
<div data-role="page" id="pageAdd">
  <div data-role="header" data-theme="b">
    <h1>NewNote</h1>
    <a data-rel="back" data-transition="slide" data-direction="reverse" data-role="button" data-icon="back">Back</a>
  </div>

  <div data-role="main" class="ui-content">
    <form method="post" action="saveaddnote.php">
      <div class="ui-field-contain" id="formAdd">
        <label>เรื่อง:</label>
        <input type="text" name="title" id="title">
        <label>รายละเอียด:</label>
        <textarea name="content" id="content"></textarea>
      </div>
      <input type="submit" value="Save" id="btn_save" data-theme="b" data-transition="flow">
    </form>
  </div>

  <div data-role="footer" data-position="fixed" data-theme="b">
    <h1>BY 58160434 | Sontaya Rungsaard</h1>
  </div>
  <script type="text/javascript">
  $("#btn_save").click(function(event){
    var valid = true,
      errorMessage = "";

      if($('#title').val() == ''){
        errorMessage = "โปรดป้อนชื่อเรื่อง\n";
        valid = false;
      }
      if($('#content').val() == ''){
        errorMessage += "โปรดป้อนรายละเอียด\n"
        valid = false;
      }
      if( !valid && errorMessage.length > 0){
        alert(errorMessage);
        event.preventDefault();
      }
  });
  // $(document).on("pagecreate","#pageAdd",function(){
  //     $("#pageAdd").on("swiperight",function(){
  //       window.location='index.php';
  //     });
  //     $('#formAdd').on('swipeleft swiperight', function(e){
  //       e.stopPropagation();
  //       e.preventDefault();
  //     });
  //   });
</script>
</div>
</body>
</html>