<?php
class chatClass extends db{
  public function insert($name,$text){
    $str1="INSERT INTO chat (chat_date, chat_name, chat_text, chat_status) VALUES ('";
    $str2="', '";
    $str3="')";
    $date=date("Y-m-d H:i:s");
    $status='1';
    $sql = $str1.$date.$str2.$name.$str2.$text.$str2.$status.$str3;

    if($this->query($sql)){
      return true;
    }else{
      return false;
    }
  }
  public function logout($name){
    $sql="update chat set chat_status='0' where chat_name='".$name."'";
    if($this->query($sql)){
      echo "gg";
    }
    else{
      echo "no gg";
    }
    echo "<meta http-equiv='refresh' content='0;url=homepage.html' />";
  }
}
?>