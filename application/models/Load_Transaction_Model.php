<?php 
    class Load_Transaction_Model extends CI_Model {
        
        function __construct() {
            parent::__construct();
        }

        function sync_load_transactions ($load_transaction_id, $amount_loaded, $load_transaction_ts, $id_number, $load_terminal_id) {
            $data = array(
                    'load_transaction_id' => $load_transaction_id,
                    'amount_loaded' => $amount_loaded,
                    'load_transaction_ts' => $load_transaction_ts,
                    'id_number' => $id_number,
                    'load_terminal_id' => $load_terminal_id
                );
            $this->db->insert('load_transaction', $data);

            return "Sync Successful";
        }   

    }

?>