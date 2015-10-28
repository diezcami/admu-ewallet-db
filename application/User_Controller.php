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
/*
   // GET Methods: For reference only
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
*/

   /**
    * This method returns or updates the balance of a user
    *
    * @post_params: id_number, [new_balance]
    * @output: JSON of user's balance
    */
   function balance_post() {
        $id_number = $this->post('id_number');
        $new_balance = $this->post('new_balance');
        $this->load->model('User_Model');
        if ($new_balance !== NULL) {
          $data = $this->User_Model->set_balance($id_number, $new_balance);
        } else {
          $data = $this->User_Model->get_balance($id_number);
        }
        $this->response($data, 404);
   }

   /**
    * This method returns all users
    * TODO: Use last_updated_TS
    *
    * @post_params: none
    * @output: JSON containing users
    */
   function users_post() {
        // $id_number = $this->post('id_number'); 
        $this->load->model('User_Model');
        $data = $this->User_Model->get_users();
        $this->response($data, 404);
   }
}