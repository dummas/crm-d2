<?php

class Products extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Product');
		$this->load->library('encrypt');
		$this->lang->load('error');
	}

	/*
	* List all products page
	*/
	public function roll()
	{
		// TODO
	}
	
	/*
	* View product page
	*/
	public function view()
	{
		// TODO
	}
	
	/*
	* Edit product page
	*/
	public function edit()
	{
		// TODO
	}
	
	/*
	* Delete product page
	*/
	public function delete()
	{
		// TODO
	}
	
}

?>
