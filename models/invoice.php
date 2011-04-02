<?php

class Invoice extends CI_Model {

	/**
		* Constructor
		*
		*/
	function __contruct()
	{
		parent::__construct();
		// Loading requirement models
		// User information
		$this->load->model('User');
		// Invoices products
		$this->load->model('Invoice_product');
		// Invoices sellers
		$this->load->model('Invoice_seller');
		// Invoices buyers
		$this->load->model('Invoice_buyer');
	}
	
	/**
		* Function returns invoice series
		* @invoice_id - the id number of invoice
		*/
	function get_invoice_series ( $invoice_id = 0 )
	{
		$query = $this->db->get_where(
			'invoices',  // Table name
			array(
				'id' => $invoice_id // Where
			),
			1 // Limit
		);
		$result = $query->result();
		
		return $result[0]->series;
	}
	
	/**
		* Function returns all the invoices in the database
		*/
	function all()
	{
		return $this->db->get('invoices')->result();
	}
	
	/**
		* Function returns all existsing invoices for drop-down menu
		*
		*/
	function dropdown()
	{
		$query = $this->db->get('invoices');
		
		$invoices = array();
		
		// Default
		$invoices[0] = 'None';
		
		foreach ( $query->result() as $item ) 
		{
			$invoices[$item->id] = $item->series;
		}
		
		return $invoices;
	}
	
	/**
		* Function inserts new incoice to the database
		* @return - the invoice_id
		*/
	function insert()
	{
		$data = array(
			'user_id' => $this->input->post('user_id'),
			'series' => $this->input->post('series'),
			'date' => $this->input->post('date')
		);
		
		if ( $this->db->insert('invoices', $data) )
		{
			// Return insert_id
			return $this->db->insert_id();
		}
		
		// Return false ( zero ) otherwise
		return false;
	}
	
	/**
		* Function returns information about the invoice
		* @invoice_id - the id of the invoice
		*/
	function get ( $invoice_id = 0 )
	{
	}
	
}

?>