<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class Buy_Transaction_Controller extends REST_Controller {

   /**
    * This method receives a JSON from the Android App containing Buy Transactions
    *
    * @post_params: none
    * @output: Outputs decoded JSON array to Model
    */
   function sync_post() {
        $params = $this->input->post('params');
        $params = substr ($params, 1, -1);
        $parsable = explode ('},', $params);

        $this->load->model('Buy_Transaction_Model');

        foreach($parsable as $item) {
            $buy_transaction_ts = substr ($item, 23, 19);
            $id_number = substr ($item, 56, 6);
            $shop_terminal_id = substr ($item, 82, 3);
            $this->Buy_Transaction_Model->sync_buy_transactions($buy_transaction_ts, $id_number, $shop_terminal_id);
        }

        $this->response($parsable, 404);
   }


/*
{"shop_terminal_id":001,"item_id":001,"stock_ts:"2095-10-27 19:23:42"},
{"shop_terminal_id":001,"item_id":002,"stock_ts:"2095-10-27 13:16:21"}]

 */

/*
   function sync_post() {
        $params = $this->input->post('params');
        $params = json_decode($params, true);

        $this->load->model('Buy_Transaction_Model');

        foreach($params as $item) {
            $this->Buy_Transaction_Model->sync_buy_transactions($item['buy_transaction_ts'], $item['id_number'], $item['shop_terminal_id']);
        }
        
        $this->response($params, 404);
   }*/
}


