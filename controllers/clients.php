<?php

class Clients extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Client');
		$this->load->library('encrypt');
		$this->lang->load('error');
	}
}

?>