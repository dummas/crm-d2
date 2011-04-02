<?php

class Invoices_products extends CI_Controller {

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
			'products' => $this->Invoice_product->all()
		);
	
		$header = array(
			'title' => 'Faktūrų prekės'
		);
		
		$this->load->view('header', $header);
		$this->load->view('menu');
		$this->load->view('invoices/menu');
		$this->load->view('invoices/products/menu');
		$this->load->view('invoices/products/roll', $data);
		$this->load->view('footer');
	}
	
	public function add( $invoice_id = 0 )
	{
		if ( $this->input->post('add') )
		{
			if ( $this->Invoice_product->insert() )
			{
				// SUCCESS
				redirect('invoices_products/roll');
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
			'title' => 'Pridėti prie faktūros prekę'
		);
		
		$this->load->view('header', $header);
		$this->load->view('menu');
		$this->load->view('invoices/menu');
		$this->load->view('invoices/products/menu');
		$this->load->view('invoices/products/add', $data);
		$this->load->view('footer');
	
	}
	
	public function view()
	{
	}
	
	public function edit()
	{
	}
	
	public function delete()
	{
	}
}

?>