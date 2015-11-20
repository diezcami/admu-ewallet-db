<?php
class Users extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Shop_Terminal_Model');
    }

    public function index() {
        $data['shop_terminals'] = $this->Shop_Terminal_Model->get_shop_terminals();
        var_dump($data);
    }

    public function view() {
        $data['shop_terminals'] = $this->Shop_Terminal_Model->get_shop_terminals();
    }
}