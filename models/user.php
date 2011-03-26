<?php

class User extends CI_Model {

	function __contruct()
	{
		parent::__construct();
		$this->load->model('Group');
	}

	/*
	* Function checks if user exists in database
	*/
	function exists()
	{
		// filtering requirement data
		$data = array (
			'username' => $this->input->post('username'),
			'password' => $this->encrypt->sha1($this->input->post('password'))
		);
		
		$result = $this->db->get_where('users', $data );
		if ( $result->num_rows != 0 )
		{
			return true;
		}
		return false;
	}
	
	/*
	* Function registers user session
	*/
	function session_register()
	{
		$data = array (
			'username' => $this->input->post('username'),
			'logged_in' => true
		);
		$this->session->set_userdata($data);
	}
	
	/*
	* Function destroys user session
	*/
	function session_destroy()
	{
		$this->session->sess_destroy();
	}
	
	/*
	* Function checks if user is registered
	*/
	function logged()
	{
		if ( $this->session->userdata('logged_in') == true )
		{
			return true;
		}
		return false;
	}

	/*
	* Function returns details of the user
	*/
	function get( $user_id = 0 )
	{
		$data = array (
			'id' => $user_id
		);
		
		$query = $this->db->get_where('users', $data);
		$user = array();
		
		foreach ( $query->result() as $item )
		{
			$item->group_name = $this->Group->group_name ( $item->group_id );
			array_push ( $user, $item );
		}
		
		return $user[0];
	
	}
	
	/*
	* Function returns all the users
	*/
	function all()
	{
		$query = $this->db->get('users');
		$users = array();
		foreach ( $query->result() as $item )
		{
			$item->group_name = $this->Group->group_name ( $item->group_id );
			array_push ( $users, $item );
		}
		return $users;
	}

	/*
	* Function adds new user to database
	*/
	function insert()
	{
		// Filtering requirement data
		$data = array (
			'group_id' => $this->input->post('group_id'),
			'username' => $this->input->post('username'),
			'password' => $this->encrypt->sha1($this->input->post('password')),
			'email' => $this->input->post('email')
		);
		// Inserting to database
		if ( $this->db->insert('users', $data) )
		{
			return true;
		}
		return false;
	}

	/*
	* Function updates user details
	*/
	function update()
	{
		echo "Dast is update";
	}

	/*
	* Function removes user
	*/
	function remove()
	{
		$data = array (
			'id' => $this->input->post('id')
		);
		
		$this->db->delete('users', $data);
		
		return true;
	}
	
	/*
	* Function counts how many users are in the group
	*/
	function users_in_group( $group_id = 0 )
	{
		if ( $group_id == 0 )
		{
			return 0;
		}
		
		$data = array (
			'group_id' => $group_id
		);
		
		$query = $this->db->get_where('users', $data );
		return $query->num_rows;
	}

}
