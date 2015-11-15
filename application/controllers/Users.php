<?php
class Users extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->model('User_model');
  }
  public function index()
  {
    $data['users'] = $this->User_model->get_users();
    var_dump($data);
  }
  public function view()
  {
    $data['users'] = $this->User_model->get_users();
  }
}