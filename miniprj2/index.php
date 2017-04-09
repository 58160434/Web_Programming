<?php
include("db.php");
$query = "SELECT * FROM MyNotes GROUP BY MyNotes_date ORDER BY MyNotes_date DESC";
$result = $conn->query($query);
if (!$result) die($conn->error);
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
<!--pang My Notes-->
<div data-role="page" id="pageMyNotes">
  <div data-role="header" data-theme="b" data-position="fixed">
    <h1>MyNotes</h1>
    <a href="addnote.php" data-transition="slide" class="ui-btn ui-btn-right ui-corner-all ui-shadow ui-icon-plus ui-btn-icon-left">Add</a>
  </div>
  <div data-role="main" class="ui-content">
  <h2>My Notes</h2>
    <ul data-role="listview" date ="true" data-inset="true">
    <?php while ($row = $result->fetch_array()) { ?>
      <li data-role="list-divider" data-theme="b"><?php echo $row['MyNotes_date']; ?></li>

      <?php
      $query = "SELECT * FROM MyNotes WHERE MyNotes_date='".$row['MyNotes_date']."' ORDER BY MyNotes_id DESC"; 
      mysqli_query("SET NAMES utf8");
      $result2 = $conn->query($query);
      while($row = $result2->fetch_array()) { ?>

      <li>
        <a data-transition="slide" href="seenote.php?MyNotes_id=<?php echo $row['MyNotes_id']; ?>">
        <h2><?php echo $row['MyNotes_title']; ?></h2>
        <p><?php echo $row['MyNotes_content']; ?></p></a>
        <a class="ui-icon-carat-r" data-transition="slide" href="editnote.php?MyNotes_id=<?php echo $row['MyNotes_id']; ?>"></a>
      </li>
      <?php } ?>
    <?php } ?>
    </ul>
  </div>

  <div data-role="footer" data-theme="b">
    <h1>BY 58160434 | Sontaya Rungsaard</h1>
  </div>
</div>
</body>
</html>