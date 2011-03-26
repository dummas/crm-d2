<?php

class Groups extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Group');
		$this->load->library('encrypt');
		$this->lang->load('error');
	}
	
	/*
	* List all groups page
	*/
	public function roll()
	{
	
		$data['groups'] = $this->Group->all();
	
		$header = array(
			'title' => 'Groups'
		);
		
		$this->load->view('header', $header);
		$this->load->view('menu');
		$this->load->view('groups/menu');
		$this->load->view('groups/roll', $data);
		$this->load->view('footer');
	}
	
	/*
	* View group page
	*/
	public function view( $group_id )
	{
		// TODO
	}
	
	public function add()
	{
		if ( $this->input->post('add') )
		{
			if ( $this->Group->insert() )
			{
				// TODO
				redirect('groups/roll');
			}
			else
			{
				// TODO
			}
		}
		
		$data = array (
			'groups' => $this->Group->dropdown()
		);
		
		$header = array(
			'title' => 'Group add'
		);
		
		$this->load->view('header', $header);
		$this->load->view('menu');
		$this->load->view('groups/menu');
		$this->load->view('groups/add', $data);
		$this->load->view('footer');
	}
	
	/*
	* Edit group page
	*/
	public function edit( $group_id = 0 )
	{
		// TODO
	}
	
	/*
	* Delete group page
	*/
	public function delete( $group_id = 0 )
	{
		if ( $this->input->post('delete') )
		{
			if ( $this->Group->remove() )
			{
				// TODO
				redirect('groups/roll');
			}
			else
			{
				// TODO
			}
		}
		
		$data = array (
			'group_id' => array('id' => $group_id )
		);
	
		$header = array(
			'title' => 'Delete group'
		);
	
		$this->load->view('header', $header);
		$this->load->view('menu');
		$this->load->view('groups/delete', $data);
		$this->load->view('footer');
	}
}

?>