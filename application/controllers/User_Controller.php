<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class User_Controller extends REST_Controller {

   /**
    * This method returns all users
    * TODO: Use last_updated_TS
    *
    * WORKING BUILD
    *
    * @flow: Server->App
    * @post_params: none
    * @output: JSON containing users
    */
   function users_post(){
        $this->load->model('User_Model');
        $data = $this->User_Model->get_users();
        $this->response($data, 404);
   }

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
}
