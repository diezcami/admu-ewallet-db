<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class Stock_Controller extends REST_Controller {
   /**
    * This method receives a JSON from the Android App containing Stocks
    * Sample JSON (As of 11/1):
    * [{"shop_terminal_id":"001","item_id":101,"stock_ts":"2015-11-01 17:29:00","quantity":100}]
    *
    * TODO:
    *  String Shop_Terminal_ID Parsing
    *  Remove Stock_TS
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

        $this->load->model('Stock_Model');

        foreach($parsable as $item) {
            $shop_terminal_id = substr ($item, 21, 3); 
            $item_id = substr ($item, 36, 3);
            $stock_ts = substr ($item, 52, 19);
            $quantity = $this->quantity_parse (substr ($item, 84));

            echo $stock_ts;
            $this->Stock_Model->sync_stocks($shop_terminal_id, $item_id, $stock_ts, $quantity);
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
