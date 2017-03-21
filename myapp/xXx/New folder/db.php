<?php

	class db {
		private $hostname = "localhost";
		private $username = "it58160434";
		private $password = "0896959711";
		private $dbname = "it58160434";
		public $link;
		public $result;

		// Open a connect to the database.
	// Make sure this is called on every page that needs to use the database.
		public function connect() {
			$this->link = new mysqli( $this->hostname, $this->username, $this->password, $this->dbname );

			if ( mysqli_connect_errno() ) {
				printf("Connection failed: %s\
					", mysqli_connect_error());
				exit();
			}
        	//echo "connect succless";
        	return true;
        }

        public function query($sql){
        	if ($this->result=mysqli_query($this->link, $sql)) {
        	// echo "Database query successfully";
        		return true;
        	} else {
        	//echo "Error query database: " . $this->link->error;
        		return false;
        	}
        }

        public function close_connect(){
        	mysqli_close($this->link);
        }
    }
?>