<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class Buy_Transaction_Controller extends REST_Controller {
   /**
    * This method receives a JSON from the Android App containing Buy Transactions
    * Sample JSON (As of 11/2):
    * [{"buy_transaction_id":10001,"buy_transaction_ts":"2015-11-02 20:27:46","id_number":131356,"shop_terminal_id":"001"}]
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
        $this->load->model('Buy_Transaction_Model');

        for( $i = 0; $i < count($params); $i++ ){
            $temp = $this->Buy_Transaction_Model->sync_buy_transactions($params[$i]['buy_transaction_id'], $params[$i]['buy_transaction_ts'], $params[$i]['id_number'], $params[$i]['shop_terminal_id']);
        }

        $this->response($temp, 404);
   }
}