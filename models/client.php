<?php

class Client extends CI_Model {

	function __contruct()
	{
		parent::__construct();
	}
	
	/*
	* Function removes all the clients
	*/
	function all()
	{
		return $this->db->get('clients')->result();
	}
	
	/*
	* Function returns all the groups for drop down menu
	*/
	function dropdown()
	{
		$query = $this->db->get('clients');
		
		$groups = array();
		
		// Default
		$groups[0] = 'None';
		
		foreach ( $query->result() as $item ) 
		{
			$groups[$item->id] = $item->name;
		}
		
		return $groups;
	}
	
	/*
	* Function return one client
	* @client_id - client id in the database
	*/
	function get( $client_id = 0 )
	{
		$data = array (
			'id' => $client_id
		);
		$query = $this->db->get_where('clients', $data);
		foreach ( $query->result() as $item )
		{
			return $item;
		}
	}
	
	/*
	* Function inserts new data to database
	*/
	function insert()
	{
		$data = array (
			'firstname' => $this->input->post('firstname'),
			'lastname' => $this->input->post('lastname'),
			'date' => $this->input->post('date'),
			'name' => $this->input->post('name'),
			'address' => $this->input->post('address'),
			'company_code' => $this->input->post('company_code'),
			'pvm_code' => $this->input->post('pvm_code'),
			'cow_number' => $this->input->post('cow_number'),
			'heifer_number' => $this->input->post('heifer_number'),
			'bull_number' => $this->input->post('bull_number'),
			'calf_number' => $this->input->post('calf_number')
		);
		
		if ( $this->db->insert('clients', $data) )
		{
			return true;
		}
		return false;
	}
	
	/*
	* Function updates client data
	* @client_id - client id the database
	*/
	function update( $client_id = 0 )
	{
		
		$data = array (
			'firstname' => $this->input->post('firstname'),
			'lastname' => $this->input->post('lastname'),
			'date' => $this->input->post('date'),
			'name' => $this->input->post('name'),
			'address' => $this->input->post('address'),
			'company_code' => $this->input->post('company_code'),
			'pvm_code' => $this->input->post('pvm_code'),
			'cow_number' => $this->input->post('cow_number'),
			'heifer_number' => $this->input->post('heifer_number'),
			'bull_number' => $this->input->post('bull_number'),
			'calf_number' => $this->input->post('calf_number')
		);
		
		
		$this->db->where( 'id', $client_id );
		
		
		
		if ( $this->db->update('clients', $data) )
		{
			return true;
		}
		return false;
		
	}
	
	/*
	* Function removes client data
	*/

	function remove()
	{
	
		$data = array (
			'id' => $this->input->post('id')
		);
		
		$this->db->delete('clients', $data);
		
		return true;
	}
	
}

?>