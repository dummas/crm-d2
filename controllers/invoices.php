<?php

class Invoices extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Invoice');
		$this->load->library('encrypt');
		$this->lang->load('error');
	}
	
	/*
	* List all invoices page
	*/
	public function roll()
	{
		// TODO
	}
	
	/*
	* View invoice page
	*/
	public function view()
	{
		// TODO
	}
	
	/*
	* Edit invoice page
	*/
	public function edit()
	{
		// TODO
	}
	
	/*
	* Delete invoice page
	*/
	public function delete()
	{
		// TODO
	}
}

?>