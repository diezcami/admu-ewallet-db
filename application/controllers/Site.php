<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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

	public function users($update=0, $id=null){
		if($update==1){
			$this->User_Model->add_user($this->input->post("id_number"),$this->input->post("first_name"),$this->input->post("last_name"),$this->input->post("pin"),$this->input->post("balance"));
		}
		if($update==2){
			$this->User_Model->update_user($id,$this->input->post("firstname"),$this->input->post("lastname"),$this->input->post("pin"),$this->input->post("balance"));
		}
		$data['users'] = $this->User_Model->get_users();
		$data['update'] = $update; // I'm using this regardless of adding/editing entries ok
		$this->view($this->nav[0][2], $data);
	}

	public function load_terminals($update=0, $id=null){
		if($update==1){
			$this->Load_Terminal_Model->add_load_terminal($this->input->post("pin"));
		}
		if($update==2){
			$this->Load_Terminal_Model->update_load_terminal($id,$this->input->post("pin"));
		}
		$data['load_terminals'] = $this->Load_Terminal_Model->get_load_terminals();
		$data['update'] = $update;
		$this->view($this->nav[1][2], $data);
	}

	public function shop_terminals($update=0, $id=null){
		if($update==1){
			$this->Shop_Terminal_Model->add_shop_terminal($this->input->post("pin"));
		}
		if($update==2){
			$this->Shop_Terminal_Model->update_shop_terminal($id,$this->input->post("pin"),$this->input->post("balance"));
		}
		$data['shop_terminals'] = $this->Shop_Terminal_Model->get_shop_terminals();
		$data['update'] = $update;
		$this->view($this->nav[2][2], $data);
	}

	public function items($update=0, $id=null){
		if($update==1){
			$this->Item_Model->add_item($this->input->post("item_name"), $this->input->post("item_price"));
		}
		if($update==2){
			$this->Item_Model->update_item($id,$this->input->post("name"),$this->input->post("price"));
		}
		$data['items'] = $this->Item_Model->get_items();
		$data['update'] = $update;
		$this->view($this->nav[3][2], $data);
	}

	/*
		EDIT FUNCTIONS
	 */
	public function edit_user( $id_number ){
		$data['users'] = $this->User_Model->get_user($id_number);
		$this->view('view_edit_user', $data);
	}
	public function edit_load_terminal( $id_number ){
		$data['load_terminals'] = $this->Load_Terminal_Model->get_load_terminal($id_number);
		$this->view('view_edit_load_terminal', $data);
	}
	public function edit_shop_terminal( $id_number ){
		$data['shop_terminals'] = $this->Shop_Terminal_Model->get_shop_terminal($id_number);
		$this->view('view_edit_shop_terminal', $data);
	}
	public function edit_item( $id_number ){
		$data['items'] = $this->Item_Model->get_item($id_number);
		$this->view('view_edit_item', $data);
	}
	public function edit_shop_terminal_stock( $terminal_id, $item_id ){
		$data['stocks'] = $this->Stock_Model->get_stock($terminal_id, $item_id);
		$this->view('view_edit_shop_terminal_stock', $data);
	}
	public function edit_item_stock( $item_id, $terminal_id ){
		$data['stocks'] = $this->Stock_Model->get_stock($terminal_id, $item_id);
		$this->view('view_edit_item_stock', $data);
	}

	/*
		VIEW FUNCTIONS
	 */
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

	/* Params here are in the opposite order */
	public function shop_terminal_stocks( $terminal_id=null, $update=0,$item_id=null  ){ //id = shop_terminal_id
		if($update==1){
			$this->Stock_Model->add_stock($terminal_id, $this->input->post("item_id"), $this->input->post("quantity"));
		}
		if($update==2){
			$this->Stock_Model->update_stock($terminal_id,$item_id,$this->input->post("quantity"));
		}
		$data['shop_terminal_id'] = $terminal_id;
		$data['stocks'] = $this->Stock_Model->get_stocks_per_terminal($terminal_id);
		$data['update'] = $update; 
		$this->view('view_shop_terminal_stocks', $data);
	}

	public function item_stocks($item_id=null, $update=0, $terminal_id=null){ //id = item_id
		if($update==1){
			$this->Stock_Model->add_stock($this->input->post("shop_terminal_id"), $item_id, $this->input->post("quantity"));
		}
		if($update==2){
			$this->Stock_Model->update_stock($terminal_id,$item_id,$this->input->post("quantity"));
		}
		$data['item_id'] = $item_id;
		$data['stocks'] = $this->Stock_Model->get_stocks_per_item($item_id);
		$data['update'] = $update;
		$this->view('view_item_stocks', $data);
	}
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */