<?php

class User extends CI_Model {

	function __contruct()
	{
		parent::__construct();
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
	function view()
	{
	}
	
	/*
	* Function returns all the users
	*/
	function all()
	{
		return $this->db->get('users')->result();
		
	}

	/*
	* Function adds new user to database
	*/
	function insert()
	{
		// Filtering requirement data
		$data = array (
			'group_id' => 1, // TODO: group_id
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
	}

	/*
	* Function removes user
	*/
	function delete()
	{
	}

}
