<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class Stock_Controller extends REST_Controller {
   /**
    * This method receives a JSON from the Android App containing Stocks
    * Sample JSON (As of 11/1):
    * [{"shop_terminal_id":"001","item_id":101,"quantity":100}]
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
        $this->load->model('Stock_Model');
        for( $i = 0; $i < count($params); $i++ ){
            $temp = $this->Stock_Model->sync_stocks($params[$i]['shop_terminal_id'], $params[$i]['item_id'], $params[$i]['quantity']);
        }
        $this->response($temp, 404);
   }

   function stock_post() {
        $item_id = $this->post('item_id');
        $shop_terminal_id = $this->post('shop_terminal_id');
        $this->load->model('Stock_Model');
        $data = $this->Stock_Model->get_stock($shop_terminal_id, $item_id);
        $this->response($data, 404);
   }
}