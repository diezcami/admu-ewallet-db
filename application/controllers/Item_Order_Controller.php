<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class Item_Order_Controller extends REST_Controller {

   /**
    * This method receives a JSON from the Android App containing Item Orders
    * Sample JSON (11/1, NOT FINAL):
    * [{"buy_transaction_id":01,"item_id":001,"quantity":3}]
    *
    * TODO:
    *  Fix Buy_Transaction_ID Formatting (2->5)
    *  Quantity Parsing
    *
    * @flow: App->Server
    * @post_params: none
    * @output: Outputs decoded JSON array to Model
    */
   function sync_post() {
        $params = $this->input->post('params');
        $params = substr ($params, 1, -1);
        
        if ( strpos($params, "},")  || strpos($params, "},")==0 ){
            $parsable = explode ('},', $params);
        } else {
            $parsable = array($params);
        }

        $this->load->model('Item_Order_Model');

        foreach($parsable as $item) {
            $buy_transaction_id = substr ($item, 22, 2);
            $item_id = substr ($item, 35, 3);
            $quantity = $this->quantity_parse(substr ($item, 50);
            $this->Item_Order_Model->sync_items($buy_transaction_id, $item_id, $quantity);
        }

        $this->response($parsable, 404);
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
