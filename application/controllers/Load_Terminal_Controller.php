<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class Load_Terminal_Controller extends REST_Controller {

   /**
    * This method returns a load terminal's PIN number
    *
    * WORKING BUILD
    *
    * @flow: Server->App
    * @post_params: load_terminal_id
    * @output: PIN number 
    */

   function pin_post() {
        $load_terminal_id = $this->post('load_terminal_id');
        $this->load->model('Load_Terminal_Model');
        $data = $this->Load_Terminal_Model->get_load_terminal_pin($load_terminal_id);
        $this->response($data, 404);
   }
}
