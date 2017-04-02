<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	public function getlast($n)
	{
		//echo date('H:i:s d-m-Y');
		$this->load->model('msg_model');
		$msg = $this->msg_model;
		$result = $msg->get_last($n);
		$html = "";
		foreach($result->result() as $row) {
			//$row[] = $row;
			$html.="[$row->post_by] $row->message -$row->post_dt<br>";
		}
		//echo json_encode($row);
		echo $html;
	}
	function postmsg()
	{
		$message = $this->input->post('msg');
		$post_by = $this->input->post('post_by');
		$this->load->model('msg_model');
		$msg = $this->msg_model;
		$msg->insert($message, $post_by);
	}
}
?>