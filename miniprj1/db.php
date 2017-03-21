<?php
      class db {
      	private $hostname="localhost";
      	private $username="it58160434";
      	private $password="0896959711";
      	private $dbname="it58160434";
      	public $link;
      	public $result;
      	function connect(){
      	if ($this->link = mysqli_connect(
      	                   $this->hostname,
      			           $this->username,
      			           $this->password,
      			           $this->dbname)){

      	    return ture;
      	}else{
      		echo "Can't connect to the database";
      		return false;
      	}
      	}
        function query($sql){
             if($this->result = mysqli_query($this->link,$sql))
             {
             	return true;
             }else{
             	return false;
             }

        }
        function close(){
              mysql_close($this->link);
        }
      }

?>