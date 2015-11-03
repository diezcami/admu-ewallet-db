<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class Item_Order_Controller extends REST_Controller {

   /**
    * This method receives a JSON from the Android App containing Item Orders
    * Sample JSON (11/1, NOT FINAL):
    * [{"buy_transaction_id":10001,"item_id":101,"quantity":3}]
    *
    * WORKING BUILD
    *
    * @flow: App->Server
    * @post_params: none
    * @output: Outputs decoded JSON array to Model
    */
   
   function sync_post() {
        $temp = file_get_contents('php://input');
        $temp = substr($temp, 7);
        $params = json_decode($temp, TRUE);
        $this->load->model('Item_Order_Model');

        for( $i = 0; $i < count($params); $i++ ){
            $temp = $this->Item_Order_Model->sync_item_orders($params[$i]['buy_transaction_id'], $params[$i]['item_id'], $params[$i]['quantity']);
        }

        $this->response($temp, 404);
   }
}
