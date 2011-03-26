<?php if (! defined('BASEPATH')) exit('No direct script access allowed'); 

class Users extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('User');
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
		
		$this->load->view('users/header');
		$this->load->view('users/menu');
		$this->load->view('users/index', $data);
		$this->load->view('users/footer');
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
		$this->load->view('users/header');
		$this->load->view('users/login', $data);
		$this->load->view('users/footer');
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
		$this->load->view('users/header');
		$this->load->view('users/add');
		$this->load->view('users/footer');
	}
	
	/*
	* List users page
	*/
	public function roll()
	{
		$data = array(
			'users' => $this->User->all()
		);
		
		$this->load->view('users/header');
		$this->load->view('users/menu');
		$this->load->view('users/roll', $data);
		$this->load->view('users/footer');
	}
	
	/*
	* View user page
	*/
	public function view()
	{
		$this->load->view('users/header');
		$this->load->view('users/view');
		$this->load->view('users/footer');
	}
	
	/*
	* Edit user page
	*/
	public function edit()
	{
		$this->load->view('users/header');
		$this->load->view('users/edit');
		$this->load->view('users/footer');
	}

	/*
	* Delete user page
	*/
	public function del()
	{
		$this->load->view('users/header');
		$this->load->view('users/del');
		$this->load->view('users/footer');
	}

}
