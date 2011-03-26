<?php if (! defined('BASEPATH')) exit('No direct script access allowed'); 

class Users extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('User');
		$this->load->model('Group');
		$this->load->library('encrypt');
		$this->lang->load('error');
	}
	
	/*
	* Index page for all users 
	*/
	public function index()
	{
		if ( ! $this->User->logged() )
		{
			redirect('users/login');
		}
		
		$data = array();
		
		$header = array(
			'title' => 'Main'
		);
		
		$this->load->view('header', $header);
		$this->load->view('menu');
		$this->load->view('users/index', $data);
		$this->load->view('footer');
	}

	/*
	* Login page
	*/
	public function login()
	{		
		$data = array();
		// Check if user is already registerd
		if ( $this->User->logged() )
		{
			redirect('/');
		}
		// Check if form is submitted
		if ( $this->input->post('login') )
		{
			if ( $this->User->exists() )
			{
				// User exists
				$this->User->session_register();
				redirect('/');
			}
			else
			{
				// User does not exists
				$data['message'] = $this->lang->line('error_user_not_exists');
			}
		}
		
		$header = array(
			'title' => 'Login'
		);
		
		$this->load->view('header', $header);
		$this->load->view('users/login', $data);
		$this->load->view('footer');
	}
	
	/*
	* Logout page
	*/
	public function logout()
	{
		$this->User->session_destroy();
		redirect('/');
	}

	/*
	* Add user page
	*/
	public function add()
	{
		if ( $this->input->post('add') )
		{
			if ( $this->User->insert() )
			{
				echo "User added";
			}
			else
			{
				echo "Error on adding user";
			}
		}
		
		$data = array (
			'groups' => $this->Group->dropdown()
		);
		
		$header = array(
			'title' => 'Add user'
		);
		
		$this->load->view('header', $header);
		$this->load->view('menu');
		$this->load->view('users/menu');
		$this->load->view('users/add', $data);
		$this->load->view('footer');
	}
	
	/*
	* List users page
	*/
	public function roll()
	{
		$data = array(
			'users' => $this->User->all()
		);
		
		$header = array(
			'title' => 'List users'
		);
		
		$this->load->view('header', $header);
		$this->load->view('menu');
		$this->load->view('users/menu');
		$this->load->view('users/roll', $data);
		$this->load->view('footer');
	}
	
	/*
	* View user page
	*/
	public function view( $user_id = 0 )
	{
	
		$data = array (
			'user' => $this->User->get( $user_id )
		);
	
		$header = array(
			'title' => 'View user'
		);
	
		$this->load->view('header', $header);
		$this->load->view('menu');
		$this->load->view('users/view', $data);
		$this->load->view('footer');
	}
	
	/*
	* Edit user page
	*/
	public function edit( $user_id = 0 )
	{
	
		if ( $this->input->post('edit') )
		{
			if ( $this->User->update() )
			{
				echo "User added";
			}
			else
			{
				echo "Error on adding user";
			}
		}
		
		$data = array (
			'user' => $this->User->get( $user_id ),
			'groups' => $this->Group->dropdown()
		);
		
		$header = array(
			'title' => 'Edit user'
		);
		
		$this->load->view('header', $header);
		$this->load->view('menu');
		$this->load->view('users/add', $data);
		$this->load->view('footer');
	}

	/*
	* Delete user page
	*/
	public function delete( $user_id = 0 )
	{
		if ( $this->input->post('delete') )
		{
			if ( $this->User->remove() )
			{
				// TODO
				redirect('users/roll');
			}
			else
			{
				// TODO
			}
		}
		
		$data = array (
			'user_id' => array('id' => $user_id )
		);
	
		$header = array(
			'title' => 'Delete user'
		);
	
		$this->load->view('header', $header);
		$this->load->view('menu');
		$this->load->view('users/delete', $data);
		$this->load->view('footer');
	}

}
