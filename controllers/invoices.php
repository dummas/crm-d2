<?php

class Invoices extends CI_Controller {

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
			'invoices' => $this->Invoice->all()
		);
	
		$header = array(
			'title' => 'Faktūros'
		);
		
		$this->load->view('header', $header);
		$this->load->view('menu');
		$this->load->view('invoices/menu');
		$this->load->view('invoices/invoices/menu');
		$this->load->view('invoices/roll', $data);
		$this->load->view('footer');
	}
	
	/*
	* Function inserts new invoice to the database
	* Here goes multi-table insertion:
	* - To `invoice`
	* - To `invoice_product`
	* - To `invoice_buyer`
	* - To `invoice_seller`
	* `Invoice_seller` and `Invoice_buyer` are quite the same, but the 
	* information is different
	*/
	public function add()
	{
		// Checking if form is submited
		if ( $this->input->post('add') )
		{
			// Inserting basic information
			// Function returns inserted invoice id
			$invoice_id = $this->Invoice->insert();
			
			// Checking if invoice_id is inserted and the `invoice_id` is currect
			if ( $invoice_id != 0 )
			{
				// Inserting products
				if ( $this->Invoice_product->insert( $invoice_id ) )
				{
					// Inserting buyer information
					if ( $this->Invoice_buyer->insert( $invoice_id ) )
					{
						// Inserting seller information
						if ( $this->Invoice_seller->insert( $invoice_id ) )
						{
							// Success. Redirect
							redirect('invoices/roll');
						}
						else
						{
							// TODO: error `invoice_seller`
						}
					}
					else
					{
						// TODO: error `invoice_buyer`
					}
				}
				else
				{
					// TODO: error `invoice_product`
				}
			}
			else
			{
				// TODO: error `invoice_id`
			}
			// TODO: only for debug
			redirect('invoices/roll');
		}
		
		// Every `invoice` belongs to user
		$data = array (
			'user_id' => array('user_id' => $this->User->logged_user_id()),
			/*
			'clients' => $this->Client->dropdown(),
			'products' => $this->Product->dropdown()
			*/
		);
		
		// Basic information for header
		$header = array(
			'title' => 'Nauja faktūra'
		);
		
		// Processing the templates
		$this->load->view('header', $header);
		$this->load->view('menu');
		$this->load->view('invoices/menu');
		$this->load->view('invoices/add', $data);
		$this->load->view('footer');
	}
	
	/*
	* View invoice page
	*/
	public function view( $invoice_id = 0 )
	{
		$data = array(
			'invoice' => $this->Invoice->get ( $invoice_id ) 
		);
		
		// Basic information for header
		$header = array(
			'title' => 'Faktūros peržiūra'
		);
		
		$menu = array(
			'invoice_id' => $invoice_id,
		);
		
		// Processing the templates
		$this->load->view('header', $header);
		$this->load->view('menu');
		$this->load->view('invoices/menu', $menu);
		$this->load->view('invoices/view', $data);
		$this->load->view('footer');
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