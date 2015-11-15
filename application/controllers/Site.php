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
		$this->load->model('Shop_Terminal_Model');
		$this->load->model('Load_Terminal_Model');
		$this->load->model('Load_Transaction_Model');
		$this->load->model('Buy_Transaction_Model');
		$this->load->model('Item_Model');
		$this->load->model('Stock_Model');

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
		$data['load_terminals'] = $this->Load_Terminal_Model->get_load_terminals();
		$this->view($this->nav[1][2], $data);
	}
	public function shop_terminals(){
		$data['shop_terminals'] = $this->Shop_Terminal_Model->get_shop_terminals();
		$this->view($this->nav[2][2], $data);
	}
	public function items(){
		$data['items'] = $this->Item_Model->get_items();
		$this->view($this->nav[3][2], $data);
	}
	public function edit_user( $id_number ){
		$data['users'] = $this->User_Model->get_user($id_number);
		$this->view('view_edit_user', $data);
	}
	public function load_transactions( $load_terminal_id ){
		$data['load_terminal_id'] = $load_terminal_id;
		$data['load_transactions'] = $this->Load_Transaction_Model->get_load_transactions_per_terminal($load_terminal_id);
		$this->view('view_load_transactions', $data);
	}
	public function buy_transactions( $shop_terminal_id ){
		$data['shop_terminal_id'] = $shop_terminal_id;
		$data['buy_transactions'] = $this->Buy_Transaction_Model->get_buy_transactions_per_terminal($shop_terminal_id);
		$this->view('view_buy_transactions', $data);
	}
	public function shop_terminal_stocks( $shop_terminal_id ){
		$data['shop_terminal_id'] = $shop_terminal_id;
		$data['stocks'] = $this->Stock_Model->get_stocks_per_terminal($shop_terminal_id);
		$this->view('view_shop_terminal_stocks', $data);
	}
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */