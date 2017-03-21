<?php
    class msg Extends db {
        private $msgchat_id;
        public  $msgchat_name;
        public  $msgchat_msg;
        public  $msgchat_date;

        function insert(){
            $sql = "INSERT INTO msgchat(msgchat_name, msgchat_msg, msgchat_date)VALUES('"
                                    .$this->msgchat_name."','"
                                    .$this->msgchat_msg."','"
                                    .$this->msgchat_date."')";
            if(mysqli_query($this->link,$sql)){
                return true;

            }else{
                echo "Can't insert data to msg";
                return false;
            }
        }
        function delete($id){
            $sql = "DELETE FROM faq WHERE id =".$id;
            if(mysqli_query($this->link,$sql)){
                return true;

            }else{
                echo "Can't delete data from faq";
                return false;
            }

        }
    } 
?>
