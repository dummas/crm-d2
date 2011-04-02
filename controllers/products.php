<?php

class Products extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Product');
		$this->load->model('User');
		$this->load->library('encrypt');
		$this->lang->load('error');
	}

	/*
	* List all products page
	*/
	public function roll()
	{
	
		$data = array (
			'products' => $this->Product->all()
		);
	
		$header = array(
			'title' => 'Produktai'
		);
		
		$this->load->view('header', $header);
		$this->load->view('menu');
		$this->load->view('products/menu');
		$this->load->view('products/roll', $data);
		$this->load->view('footer');
	}
	
	/*
	* Add product page
	*/
	public function add()
	{
		if ( $this->input->post('add') )
		{
			if ( $this->Product->insert() )
			{
				// success
				redirect('products/roll');
			}
			else
			{
				// ERROR
			}
		}
		
		$data = array (
			'user_id' => array('user_id' => $this->User->logged_user_id())
		);
		
		$header = array(
			'title' => 'Pridėti produktą'
		);
		
		$this->load->view('header', $header );
		$this->load->view('menu');
		$this->load->view('products/menu');
		$this->load->view('products/add', $data );
		$this->load->view('footer');
	}
	
	/*
	* View product page
	*/
	public function view( $product_id = 0 )
	{
		$data = array (
			'product' => $this->Product->get( $product_id )
		);
	
		$header = array(
			'title' => 'Produktai'
		);
		
		$menu = array (
			'product_id' => $product_id
		);
		
		$this->load->view('header', $header);
		$this->load->view('menu');
		$this->load->view('products/menu', $menu);
		$this->load->view('products/view', $data);
		$this->load->view('footer');
	}
	
	/*
	* Edit product page
	*/
	public function edit( $product_id = 0 )
	{
		if ( $this->input->post('edit') )
		{
			if ( $this->Product->update( $product_id ) )
			{
				//echo "OK";
				// success
				redirect('products/roll');
			}
			else
			{
				//echo "Error";
				// ERROR
			}
		}
		
		$data = array (
			'user_id' => array(
				'user_id' => $this->User->logged_user_id()
			),
			'product' => $this->Product->get( $product_id )
		);
		
		$header = array(
			'title' => 'Pakeisti produktą'
		);
		
		$this->load->view('header', $header );
		$this->load->view('menu');
		$this->load->view('products/menu');
		$this->load->view('products/edit', $data );
		$this->load->view('footer');
	}
	
	/*
	* Delete product page
	*/
	public function delete( $product_id = 0 )
	{
		if ( $this->input->post('delete') )
		{
			if ( $this->Product->remove() )
			{
				// TODO
				redirect('products/roll');
			}
			else
			{
				// TODO
			}
		}
		
		$data = array (
			'product_id' => array('id' => $product_id )
		);
	
		$header = array(
			'title' => 'Produkto pašalinimas'
		);
	
		$this->load->view('header', $header);
		$this->load->view('menu');
		$this->load->view('products/menu');
		$this->load->view('products/delete', $data);
		$this->load->view('footer');
	}
	
}

?>
