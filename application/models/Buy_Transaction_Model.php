<?php 
    class Buy_Transaction_Model extends CI_Model {
        
        function __construct() {
            parent::__construct();
        }

        function sync_buy_transactions ($buy_transaction_id, $buy_transaction_ts, $id_number, $shop_terminal_id) {
            $data = array(
                    'buy_transaction_id' => $buy_transaction_id,
                    'buy_transaction_ts' => $buy_transaction_ts,
                    'id_number' => $id_number,
                    'shop_terminal_id' => $shop_terminal_id
                );
            $this->db->insert('buy_transaction', $data);

            return "Sync Successful";
        }   

        function get_buy_transactions_per_user ($id_number){
            $query = $this->db->query ("SELECT * FROM buy_transactions WHERE id_number = '{$id_number}'");
            if($query->num_rows() > 0) {
                $ret = $query->result();
            } else {
                $ret = 'This user does not exist or has no buy transactions.';
            }

            return $ret;
        }

        function get_buy_transactions_per_terminal ($shop_terminal_id){
            $query = $this->db->query ("SELECT * FROM buy_transaction WHERE shop_terminal_id = '{$shop_terminal_id}'");
            if($query->num_rows() > 0) {
                $ret = $query->result();
            } else {
                $ret = 'This terminal does not exist or has no buy transactions.';
            }

            return $ret;
        }

    }

?>