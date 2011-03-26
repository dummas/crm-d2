<?php

class Group extends CI_Model {

	function __construct()
	{
		$this->load->model('User');
	}
	
	/*
	* Function returns all the groups 
	*/
	function all()
	{
		$query = $this->db->get('groups');
		
		$groups = array();
		
		foreach ( $query->result() as $item )
		{
			$item->parent_group_name = $this->parent_group_name ( $item->parent_id );
			$item->number_of_users = $this->User->users_in_group ( $item->id );
			array_push ($groups, $item);
		}
		return $groups;
	}
	
	/*
	* Function returns all the groups for drop down menu
	*/
	function dropdown()
	{
		$query = $this->db->get('groups');
		
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
	* Function returns 
	*/
	function get()
	{
	}

	/*
	* Function inserts new group
	*/
	function insert()
	{
		$data = array (
			'parent_id' => $this->input->post('parent_id'),
			'name' => $this->input->post('name')
		);
		$this->db->insert('groups', $data );
	
	}

	/*
	* Function updates group
	*/
	function update()
	{
	}

	/*
	* Function deletes group
	*/
	function remove()
	{
		$data = array (
			'id' => $this->input->post('id')
		);
		
		$this->db->delete('groups', $data);
		
		return true;
	}
	
	function parent_group_name ( $group_id = 0 )
	{
		return $this->group_name ( $group_id );
	}
	
	/*
	* Function returns group name by id
	*/
	function group_name ( $group_id = 0 )
	{
	
		if ( $group_id == 0 )
		{
			return 'None';
		}
	
		$data = array (
			'id' => $group_id
		);
		$this->db->select('name');
		$query = $this->db->get_where ( 'groups', $data, 1 );
		$name = $query->result();
		return $name[0]->name;
	}

}
