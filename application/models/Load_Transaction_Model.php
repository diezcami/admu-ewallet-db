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

        function get_load_transactions_per_user ($id_number){
            $query = $this->db->query ("SELECT * FROM load_transaction WHERE id_number = '{$id_number}'");
            if($query->num_rows() > 0) {
                $ret = $query->result();
            } else {
                $ret = null;
                //$ret = 'This user does not exist or has no load transactions.';
            }

            return $ret;
        }

        function get_load_transactions_per_terminal ($load_terminal_id){
            $query = $this->db->query ("SELECT * FROM load_transaction WHERE load_terminal_id = '{$load_terminal_id}'");
            if($query->num_rows() > 0) {
                $ret = $query->result();
            } else {
                $ret = null;
                //$ret = 'This user does not exist or has no load transactions.';
            }

            return $ret;
        }

    }

?>