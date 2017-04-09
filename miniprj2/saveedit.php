<?php 
include("db.php");
// Edit Notes
$id = $_POST['id'];
$title = $_POST['title'];
$content = $_POST['content'];
$date = date('Y-m-d H:i:s');
$sql = "UPDATE MyNotes SET MyNotes_title='$title', MyNotes_content='$content', MyNotes_date='$date' WHERE MyNotes_id='$id'";
$conn->query($sql);
echo "<html><head><meta charset='UTF-8'></head><body><script>window.location='index.php';</script></body></html>";
$conn->close();
?>