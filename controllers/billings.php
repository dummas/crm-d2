<?php

class Billings extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Billing');
		$this->load->library('encrypt');
		$this->lang->load('error');
	}
	
	/*
	* List all billings page
	*/
	public function roll()
	{
		// TODO
	}
	
	/*
	* View billing page
	*/
	public function view()
	{
		// TODO
	}
	
	/*
	* Edit billing page
	*/
	public function edit()
	{
		// TODO
	}
	
	/*
	* Delete billing page
	*/
	public function delete()
	{
		// TODO
	}
}

?>