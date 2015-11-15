<?php
class Users extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Load_Terminal_Model');
    }

    public function index() {
        $data['shop_terminals'] = $this->Load_Terminal_Model->get_load_terminals();
        var_dump($data);
    }

    public function view() {
        $data['shop_terminals'] = $this->Load_Terminal_Model->get_load_terminals();
    }
}