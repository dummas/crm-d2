<?php

class Clients extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Client');
		$this->load->library('encrypt');
		$this->lang->load('error');
	}
	
	public function roll()
	{
	
		$data = array (
			'clients' => $this->Client->all()
		);
	
		$header = array(
			'title' => 'Klientai'
		);
		
		$this->load->view('header', $header);
		$this->load->view('menu');
		$this->load->view('clients/menu');
		$this->load->view('clients/roll', $data);
		$this->load->view('footer');
	}
	
	public function view( $client_id = 0 )
	{
		$data = array (
			'client' => $this->Client->get( $client_id )
		);
	
		$header = array(
			'title' => 'Kliento peržiūra'
		);
		
		$menu = array (
			'client_id' => $client_id
		);
		
		$this->load->view('header', $header);
		$this->load->view('menu');
		$this->load->view('clients/menu', $menu);
		$this->load->view('clients/view', $data);
		$this->load->view('footer');
	}
	
	public function add()
	{
		if ( $this->input->post('add') )
		{
			if ( $this->Client->insert() )
			{
				// Success
				redirect('clients/roll');
			}
			else
			{
			}
		}
		$header = array(
			'title' => 'Pridėti klientą'
		);
		
		$this->load->view('header', $header);
		$this->load->view('menu');
		$this->load->view('clients/menu');
		$this->load->view('clients/add');
		$this->load->view('footer');
	}
	
	public function edit( $client_id = 0 )
	{
		if ( $this->input->post('edit') )
		{
			if ( $this->Client->update( $client_id ) )
			{
				// Success
				redirect('clients/roll');
			}
			else
			{
			}
		}
		
		$data = array(
			'client' => $this->Client->get($client_id)
		);
		
		$header = array(
			'title' => 'Atnaujinti klientą'
		);
		
		$this->load->view('header', $header);
		$this->load->view('menu');
		$this->load->view('clients/menu');
		$this->load->view('clients/edit', $data);
		$this->load->view('footer');
	}
	
	public function delete( $client_id = 0 )
	{
		if ( $this->input->post('delete') )
		{
			if ( $this->Client->remove() )
			{
				// TODO
				redirect('clients/roll');
			}
			else
			{
				// TODO
			}
		}
		
		$data = array (
			'client_id' => array('id' => $client_id )
		);
	
		$header = array(
			'title' => 'Ištrinti klientą'
		);
	
		$this->load->view('header', $header);
		$this->load->view('menu');
		$this->load->view('clients/delete', $data);
		$this->load->view('footer');
	}
}

?>