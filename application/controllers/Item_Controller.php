<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class Item_Controller extends REST_Controller {

   /**
    * This method returns all items
    * TODO: Use last_updated_TS
    *
    * @post_params: none
    * @output: JSON containing users
    */
   function items_post(){

    $this->load->model('Item_Model');
    $data = $this->Item_Model->get_items();
    $this->response($data, 404);
   }
}