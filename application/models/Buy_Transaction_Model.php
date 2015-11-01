<?php 
    class Buy_Transaction_Model extends CI_Model {
        
        function __construct() {
            parent::__construct();
        }

        function sync_buy_transactions ($buy_transaction_ts, $id_number, $shop_terminal_id) {
            $data = array(
                    'buy_transaction_ts' => $buy_transaction_ts,
                    'id_number' => $id_number,
                    'shop_terminal_id' => $shop_terminal_id
                );
            $this->db->insert('buy_transaction', $data);

            return "Sync Successful";
        }   

    }

?>