<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

/**)
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */
class User_controller extends REST_Controller {

   function user_get() {
        $id_num = $this->get('id_num');
        $this->load->model('User_Model');
        $data = $this->User_Model->getUser($id_num);
        $this->response($data, 404);
   }

   function balance_get() {
        $id_num = $this->get('id_num');
        $this->load->model('User_Model');
        $data = $this->User_Model->getBalance($id_num);
        $this->response($data, 404);
   }

   function balance_post() {
        $id_num = $this->post('id_num');
        $new_balance = $this->post('new_balance');
        $this->load->model('User_Model');
        $data = $this->User_Model->setBalance($id_num, $new_balance);
        $this->response($data, 404);
   }
}

