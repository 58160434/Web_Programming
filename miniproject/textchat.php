<?php
    include("db.php");
    include("chatClass.php");
    
    $faq = new chatClass();
    $faq->connect();
    $sql = "SELECT * FROM chat";
    $faq->query($sql);
?>

<HTML>
<HEAD>
  <TITLE>Realtime Chat</TITLE>
  <META CHARSET = "UTF8">
</HEAD>

<BODY>
<?php while($row = mysqli_fetch_array($faq-> result)) { ?>
      <?php echo "<span style='font-size:16px;color:#2A8B92;'><b><i>".$row["chat_name"]."</i></b>&nbsp;</span>".
             "<span style='font-size:12px;color:#FF2525;'><b><i>"."Say :&nbsp;</i></b></span>" .
             " <span style='font-size:16px;'>" . $row["chat_text"]. "</span> ".
             "<span style='font-size:12px;color:#8F8E8E;'><i>&nbsp;".$row['chat_date'] ."</i></span><br>";?>

<?php } ?>

</BODY>

</HTML>
