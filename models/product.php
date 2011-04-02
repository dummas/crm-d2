<?php

class Product extends CI_Model {

	function __contruct()
	{
		parent::__construct();
	}
	
	function get( $product_id = 0 )
	{
		$data = array (
			'id' => $product_id
		);
		
		$query = $this->db->get_where('products', $data);
		foreach ( $query->result() as $result ) {
			return $result;
		}
	
	}
	
	function all()
	{
		return $this->db->get('products')->result();
	}
	
	/*
	* Function returns all the groups for drop down menu
	*/
	function dropdown()
	{
		$query = $this->db->get('products');
		
		$groups = array();
		
		// Default
		$groups[0] = 'None';
		
		foreach ( $query->result() as $item ) 
		{
			$groups[$item->id] = $item->name;
		}
		
		return $groups;
	}
	
	function insert()
	{
		// Filtering data
		$data = array (
			'user_id' => $this->input->post('user_id'),
			'date' => $this->input->post('date'),
			'name' => $this->input->post('name'),
			'number' => $this->input->post('number'),
			'country' => $this->input->post('country'),
			'stock' => $this->input->post('stock'),
			'remain' => $this->input->post('remain')
		);
		
		// Inserting to database
		$this->db->insert('products', $data);
		
		return true;
	}
	
	function update( $product_id = 0 )
	{
		// Filtering data
		$data = array (
			'user_id' => $this->input->post('user_id'),
			'date' => $this->input->post('date'),
			'name' => $this->input->post('name'),
			'number' => $this->input->post('number'),
			'country' => $this->input->post('country'),
			'stock' => $this->input->post('stock'),
			'remain' => $this->input->post('remain')
		);
		
		$this->db->where('id', $product_id );
		
		if ( $this->db->update('products', $data ) )
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	function remove()
	{
	
		$data = array (
			'id' => $this->input->post('id')
		);
		
		$this->db->delete('products', $data);
		
		return true;
	}
	
}
?>