<?php
class Items extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Item_Model');
    }

    public function index() {
        $data['items'] = $this->Item_Model->get_items();
        var_dump($data);
    }

    public function view() {
        $data['items'] = $this->Item_Model->get_items();
    }
}