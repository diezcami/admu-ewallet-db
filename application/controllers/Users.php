<?php
class Users extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('User_Model');
    }

    public function index() {
        $data['users'] = $this->User_Model->get_users();
        var_dump($data);
    }

    public function view() {
        $data['users'] = $this->User_Model->get_users();
    }
}