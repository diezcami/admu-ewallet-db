<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
	Made by Basil Miguel B. Begonia
	CompSAt AVP for Development
	SY 2014 - 2015
*/
class Site extends CI_Controller {
	private $nav;
	public function __construct(){
		parent::__construct();
		$this->load->model('User_Model');
		# New pages must be declared in this array to include them in the nav bar.
		# array('Page Name', 'url', 'view name*' )
		# *the view that will be loaded.
		# Don't forget to add the function for the page below!
		$this->load->helper('url');
		$this->nav = array( array('Users' , site_url('site/users') , 'view_users'),
							array('Load Terminals', site_url('site/load_terminals'), 'view_load_terminals'),
							array('Shop Terminals', site_url('site/shop_terminals'), 'view_shop_terminals'),
							array('Items', site_url('site/items'), 'view_items')
			);
		$this->load->vars(array('NavigationArray'=>$this->nav));
	}
	public function view( $currentPage = 'view_welcome', $data = null ){
		$isWelcome = false;
		if(strcasecmp($currentPage, 'view_welcome')==0){
			$isWelcome = true;
		}
			$links = array( 'activeLink' => $currentPage,
							'isWelcome'=> $isWelcome);
			$this->load->view('header', $links);
			$this->load->view($currentPage, $data);
			$this->load->view('footer');
	}
	public function index(){
		$this->view();
	}
	public function welcome(){
		$this->view();
	}
	public function users(){
		$data['users'] = $this->User_Model->get_users();
		$this->view($this->nav[0][2], $data);
	}
	public function load_terminals(){
		$this->view($this->nav[1][2]);
	}
	public function shop_terminals(){
		$this->view($this->nav[2][2]);
	}
	public function items(){
		$this->view($this->nav[3][2]);
	}
	public function edit_user( $id_number ){
		$data['users'] = $this->User_Model->get_user($id_number);
		$this->view('view_edit_user', $data);
	}
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */