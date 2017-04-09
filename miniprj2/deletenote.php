<?php 
include("db.php");

// Delete Notes
$id = addslashes($_GET['MyNotes_id']);
$sql = "DELETE FROM MyNotes WHERE MyNotes_id='$id'";
$conn->query($sql);
echo "<html><head><meta charset='UTF-8'></head><body><script>window.location='index.php';</script></body></html>";
$conn->close();
?>