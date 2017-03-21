<?php
class user extends db{
	private $userchat_id;
	public $userchat_name;
	public $userchat_email;

	function insert()	{
		$sql = "INSERT INTO userchat(userchat_name, userchat_email) VALUES('".$this->userchat_name."',
																		   '".$this->userchat_email."')";
			if(mysqli_query($this->link,$sql)){
				return true;
			}else{
				echo " Can't insert username";
				return false;
			}

	}
	function delete($userchat_id){
            $sql = "DELETE FROM userchat WHERE userchat_id =".$userchat_id;
            if(mysqli_query($this->link,$sql)){
                return true;

            }else{
                echo "Can't delete data from userchat_id";
                return false;
            }
    }
}
?>