<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Msg_model extends CI_Model {

	public function get_last($n)
	{
		$sql = "SELECT *
				FROM (SELECT *
						FROM messages
						ORDER BY id DESC
						LIMIT 0, 15) t
				ORDER BY id";
		return  $this->db->query($sql);
	}
	function insert($msg, $postby)
	{
		$sql = "INSERT INTO messages (message, post_by) VALUES(?, ?)";
		$bind_data = array($msg, $postby);
		$this->db->query($sql, $bind_data);
	}
}
?>