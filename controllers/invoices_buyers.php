<?php

class Invoices_buyers extends CI_Controller {

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
			'buyers' => $this->Invoice_buyer->all()
		);
	
		$header = array(
			'title' => 'Faktūrų pirkėjai'
		);
		
		$this->load->view('header', $header);
		$this->load->view('menu');
		$this->load->view('invoices/menu');
		$this->load->view('invoices/buyers/menu');
		$this->load->view('invoices/buyers/roll', $data);
		$this->load->view('footer');
	}
	
	public function add( $invoice_id = 0 )
	{
		if ( $this->input->post('add') )
		{
			if ( $this->Invoice_buyer->insert() )
			{
				// SUCCESS
				redirect('invoices_buyers/roll');
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
			'title' => 'Pridėti faktūros pirkėją'
		);
		
		$this->load->view('header', $header);
		$this->load->view('menu');
		$this->load->view('invoices/menu');
		$this->load->view('invoices/buyers/menu');
		$this->load->view('invoices/buyers/add', $data);
		$this->load->view('footer');
	}
}

?>