<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class Item_Order_Controller extends REST_Controller {

   /**
    * This method receives a JSON from the Android App containing Item Orders
    * Sample JSON (11/1, NOT FINAL):
    * [{"buy_transaction_id":10001,"item_id":101,"quantity":3}]
    *
    * SUPPOSEDLY WORKING BUILD
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
            $temp = $this->Item_Order_Controller->sync_item_orders($params[$i]['buy_transaction_id'], $params[$i]['item_id'], $params[$i]['quantity']);
        }

        $this->response($temp, 404);
   }

   /**
    * Determines the quantity passed in a JSON string.
    * Assumptions include the quantity being passed last, though it's easily tweakable if otherwise required.
    * 
    * @param  [string] A substring of the received JSON input 
    * @return [int] The actual quantity perscribed in the given JSON string
    */
   function quantity_parse ($json_string) {
        $quantity = 0;
        while (strlen($json_string)>0 && $json_string != '}') {
            $quantity .= $json_string[0];
            $json_string = substr ($json_string, 1);
        }

        return $quantity;
   }
}
