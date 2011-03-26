<?php

class Invoices extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Group');
		$this->load->library('encrypt');
		$this->lang->load('error');
	}
	
	/*
	* List all groups page
	*/
	public function roll()
	{
		// TODO
	}
	
	/*
	* View group page
	*/
	public function view()
	{
		// TODO
	}
	
	/*
	* Edit group page
	*/
	public function edit()
	{
		// TODO
	}
	
	/*
	* Delete group page
	*/
	public function delete()
	{
		// TODO
	}
}

?>