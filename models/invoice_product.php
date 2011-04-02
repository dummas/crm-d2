<?php

class Invoice_product extends CI_Model {

	function __contruct()
	{
		parent::__construct();
	}
	
	function insert()
	{
		$data = array (
			'invoice_id' => $this->input->post('invoice_id'),
			'name' => $this->input->post('name'),
			'measurement' => $this->input->post('measurement'),
			'quantity' => $this->input->post('quantity'),
			'price' => $this->input->post('price'),
		);
		
		if ( $this->db->insert('invoices_products', $data) )
		{
			return true;
		}
		return false;
	}
	
	function all()
	{
		$query = $this->db->get('invoices_products');
		
		$products = array();
		
		foreach ( $query->result() as $item )
		{
			$item->series = $this->Invoice->get_invoice_series ( $item->invoice_id );
			array_push ( $products, $item );
		}
		
		return $products;
	}
	
}

?>