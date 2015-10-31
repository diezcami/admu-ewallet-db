<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class Item_Order_Controller extends REST_Controller {

   /**
    * This method receives a JSON from the Android App containing Item Orders
    *
    * @post_params: none
    * @output: Outputs decoded JSON array to Model
    */
   function sync_post() {
        $params = $this->input->post('params');
        $params = substr ($params, 1, -1);
        
        if( strpos($params, "},")  || strpos($params, "},")==0 ){
            $parsable = explode ('},', $params);
        }else{
            $parsable = array($params);
        }

        $this->load->model('Item_Order_Model');

        foreach($parsable as $item) {
            $buy_transaction_id = substr ($item, 22, 2);
            $item_id = substr ($item, 35, 3);
            $quantity = substr ($item, 50, 1);
            $this->Item_Order_Model->sync_items($buy_transaction_id, $item_id, $quantity);
        }

        $this->response($parsable, 404);
   }
}
/*
[{"buy_transaction_id":01,"item_id":001,"quantity":3},{"buy_transaction_id":02,"item_id":003,"quantity":6}]
*/
