<?php

class Invoice_buyer extends CI_Model {

	function __contruct()
	{
		parent::__construct();
		$this->load->model('Invoice');
	}
	
	function insert( $invoice_id )
	{
		// TODO
		$data = array (
			'invoice_id' => $this->input->post('invoice_id'),
			'name' => $this->input->post('name'),
			'company_code' => $this->input->post('company_code'),
			'pvm_code' => $this->input->post('pvm_code'),
			'as_code' => $this->input->post('as_code'),
			'bank' => $this->input->post('bank')
		);
		
		if ( $this->db->insert('invoices_buyers', $data) )
		{
			return true;
		}
		
		return false;
	}
	
	function all()
	{
		$query = $this->db->get('invoices_buyers');
		
		$buyers = array();
		
		foreach ( $query->result() as $item )
		{
			$item->series = $this->Invoice->get_invoice_series ( $item->invoice_id );
			array_push ( $buyers, $item );
		}
		
		return $buyers;
	}
	
}

?>