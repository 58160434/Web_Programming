<?php
class MyPost extends db{
  public function insert($name,$detil){
    $str1="INSERT INTO MyPost (MyPost_date, MyPost_name,MyPost_text,MyPost_status) VALUES ('";
    $str2="', '";
    $str3="')";
    $date=date("Y-m-d H:i:s");
    $status='1';
    $sql = $str1.$date.$str2.$name.$str2.$detil.$str2.$status.$str3;

    if($this->query($sql)){
      return true;
    }else{
      return false;
    }
  }
  public function logout($name){
    $sql="update MyPost set MyPost_status='0' where MyPost_name='".$name."'";
    if($this->query($sql)){
      echo "dfasdfsa";
    }
    else{
      echo "adsfafsd";
    }
    echo "<meta http-equiv='refresh' content='0;url=homepage.html' />";
  }
}
?>