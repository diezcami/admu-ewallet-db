<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class Shop_Terminal_Controller extends REST_Controller {

   /**
    * This method returns a shop terminal's PIN number
    *
    * WORKING BUILD
    *
    * @flow: Server->App
    * @post_params: shop_terminal_id
    * @output: PIN number 
    */

   function pin_post() {
        $shop_terminal_id = $this->post('shop_terminal_id');
        $this->load->model('Shop_Terminal_Model');
        $data = $this->Shop_Terminal_Model->get_shop_terminal_pin($shop_terminal_id);
        $this->response($data, 404);
   }
}
