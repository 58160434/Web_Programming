<?php
include("db.php");

$title = $_POST['title'];
$content = $_POST['content'];
$date = date('Y-m-d H:i:s');

//Add Notes
$sql = "INSERT INTO MyNotes (MyNotes_title, MyNotes_content, MyNotes_date) VALUES ('$title', '$content', '$date')";
$conn->query($sql);
echo "<html><head><meta charset='UTF-8'></head><body><script>document.location = 'index.php';</script></body></html>";
$conn->close();
?>



