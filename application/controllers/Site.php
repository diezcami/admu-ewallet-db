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
		# New pages must be declared in this array to include them in the nav bar.
		# array('Page Name', 'url', 'view name*' )
		# *the view that will be loaded.
		# Don't forget to add the function for the page below!
		$this->load->helper('url');
		$this->nav = array( array('Projects' , site_url('site/request') , 'view_request'),
							array('Forum', site_url('site/forum'), 'view_forum'),
							array('About', site_url('site/about'), 'view_about')
			);
		$this->load->vars(array('NavigationArray'=>$this->nav));
	}

	public function view($currentPage='view_welcome'){
	$isWelcome = false;
	if(strcasecmp($currentPage, 'view_welcome')==0){
		$isWelcome = true;
	}
		$data = array( 'activeLink' => $currentPage,
						'isWelcome'=> $isWelcome);
		$this->load->view('header', $data);
		$this->load->view($currentPage);
		$this->load->view('footer');
	}
	public function index(){
		$this->view();
	}
	public function welcome(){
		$this->view();
	}
	public function request(){
		$this->view($this->nav[0][2]);
	}
	public function forum(){
		$this->view($this->nav[1][2]);
	}
	public function about(){
		$this->view($this->nav[2][2]);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */