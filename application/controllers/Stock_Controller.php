<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class Stock_Controller extends REST_Controller {

   /**
    * This method receives a JSON from the Android App containing Stocks
    *
    * @post_params: none
    * @output: Outputs decoded JSON array to Model
    */
   function sync_post() {
        $params = $this->input->post('params');
        $params = substr ($params, 1, -1);
        $parsable = explode ('},', $params);

        $this->load->model('Stock_Model');

        foreach($parsable as $item) {
            $shop_terminal_id = substr ($item, 20, 3); //20
            $item_id = substr ($item, 34, 3); //34
            $stock_ts = substr ($item, 49, 19); //TODO: Parses correctly, doesn't input into DB right
            echo $stock_ts;
            $this->Stock_Model->sync_stocks($shop_terminal_id, $item_id, $stock_ts);
        }

        $this->response($parsable, 404);
   }

/*
[{"shop_terminal_id":003,"item_id":001,"stock_ts:"2095-10-27 19:23:42"},{"shop_terminal_id":003,"item_id":003,"stock_ts:"2095-10-27 13:16:21"}] */
}
