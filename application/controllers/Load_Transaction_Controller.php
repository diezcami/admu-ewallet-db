<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class Load_Transaction_Controller extends REST_Controller {
   /**
    * This method receives a JSON from the Android App containing Load Transactions
    * Sample JSON (As of 11/2):
    * [{"load_transaction_id":10001,"amount_loaded":1000,load_transaction_ts":"2015-11-02 20:27:46","id_number":131356,"load_terminal_id":"001"}]
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
        $this->load->model('Load_Transaction_Model');

        for( $i = 0; $i < count($params); $i++ ){
            $temp = $this->Load_Transaction_Model->sync_load_transactions($params[$i]['load_transaction_id'], $params[$i]['amount_loaded'], $params[$i]['load_transaction_ts'], $params[$i]['id_number'], $params[$i]['load_terminal_id']);
        }

        $this->response($temp, 404);
   }
}