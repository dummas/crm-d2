<?php

class Invoices_sellers extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		// Loading models
		$this->load->model('Invoice');
		$this->load->model('Product');
		$this->load->model('Client');
		$this->load->model('User');
		$this->load->model('Invoice_product');
		$this->load->model('Invoice_seller');
		$this->load->model('Invoice_buyer');
		
		$this->load->library('encrypt');
		$this->lang->load('error');
	}
	
	/*
	* List all invoices page
	*/
	public function roll()
	{
		$data = array (
			'sellers' => $this->Invoice_seller->all()
		);
	
		$header = array(
			'title' => 'Faktūrų pardavėjai'
		);
		
		$this->load->view('header', $header);
		$this->load->view('menu');
		$this->load->view('invoices/menu');
		$this->load->view('invoices/sellers/menu');
		$this->load->view('invoices/sellers/roll', $data);
		$this->load->view('footer');
	}
	
	/*
	* Function for adding new seller
	*/
	public function add( $invoice_id = 0 )
	{
		if ( $this->input->post('add') )
		{
			if ( $this->Invoice_seller->insert() )
			{
				// SUCCESS
				redirect('invoices_sellers/roll');
			}
			else
			{
				// ERROR
			}
		}
		$data = array (
			'invoice_id' => $invoice_id,
			'invoices' => $this->Invoice->dropdown()
		);
	
		$header = array(
			'title' => 'Faktūrų pirkėjai'
		);
		
		$this->load->view('header', $header);
		$this->load->view('menu');
		$this->load->view('invoices/menu');
		$this->load->view('invoices/sellers/menu');
		$this->load->view('invoices/sellers/add', $data);
		$this->load->view('footer');
	}
	
	/*
	* Function for viewing existing seller
	*/
	public function view()
	{
	}
	
	/*
	* Function for editing seller
	*/
	public function edit()
	{
	}
	
	/*
	* Function for deleting seller
	*/
	public function delete()
	{
	}
}

?>