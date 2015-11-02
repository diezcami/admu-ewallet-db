<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class Buy_Transaction_Controller extends REST_Controller {

   /**
    * This method receives a JSON from the Android App containing Buy Transactions
    * Sample JSON (As of 11/2):
    * [{"buy_transaction_id":10001,"buy_transaction_ts":"2015-11-02 20:27:46","id_number":131356,"shop_terminal_id":"001"}]
    *
    * @flow: App->Server
    * @post_params: none
    * @output: Outputs decoded JSON array to Model
    */
   function sync_post() {
        $params = $this->input->post('params');
        $params = substr ($params, 1, -1);

        if( strpos($params, "},")  || strpos($params, "},") ==0 ){
            $parsable = explode ('},', $params);
        }else{
            $parsable = array($params);
        }

        $this->load->model('Buy_Transaction_Model');

        foreach($parsable as $item) {
            $buy_transaction_id = substr ($item, 22, 5);
            $buy_transaction_ts = substr ($item, 50, 19);
            $id_number = substr ($item, 83, 6);
            $shop_terminal_id = (int)substr ($item, 110, 3);
            $this->Buy_Transaction_Model->sync_buy_transactions($buy_transaction_id, $buy_transaction_ts, $id_number, $shop_terminal_id);
        }

        $this->response($parsable, 404);
   }
}