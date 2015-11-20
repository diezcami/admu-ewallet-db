<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class Item_Controller extends REST_Controller {

   /**
    * This method returns all items
    * MAGIS TODO: Use last_updated_TS
    *
    * WORKING BUILD
    *
    * @flow: Server->App
    * @post_params: none
    * @output: JSON containing users
    */
    function items_post(){
        $this->load->model('Item_Model');
        $data = $this->Item_Model->get_items();
        $this->response($data, 404);
    }

    /*
        NOT USED, UNTESTED
     */
   function sync_post() {
        $temp = file_get_contents('php://input');
        $temp = substr($temp, 7);
        $params = json_decode($temp, TRUE);
        $this->load->model('Item_Model');
        for( $i = 0; $i < count($params); $i++ ){
            $temp = $this->Stock_Model->sync_items($params[$i]['item_id'], $params[$i]['item_name'], $params[$i]['item_price']);
        }
        $this->response($temp, 404);
   }
}