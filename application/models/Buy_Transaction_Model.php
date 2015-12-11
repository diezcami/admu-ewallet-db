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
                $ret = null;
            }

            return $ret;
        }

        function get_transactions( $shop_terminal, $month, $day ){
            //$query = $this->db->query("SELECT * FROM buy_transaction WHERE SELECT item.item_name, item.item_price, item_order.quantity, item_order.quantity * item.item_price FROM `item`INNER JOIN item_order ON item.item_id = item_order.item_id INNER JOIN buy_transaction ON item_order.buy_transaction_id = buy_transaction.buy_transaction_idWHERE shop_terminal_id = '{$shop_terminal}' AND buy_transaction_ts LIKE '2015-{$month}%' ");

            $this->db->select('item_name, item_price, quantity');
            $this->db->from('item a');
            $this->db->join('item_order b', 'a.item_id=b.item_id', 'inner');
            $this->db->join('buy_transaction c','b.buy_transaction_id = c.buy_transaction_id','inner');
            $this->db->where( 'shop_terminal_id', $shop_terminal);
            if( $day =='-' ){
                $this->db->like( 'buy_transaction_ts', '2015-'.$month, 'after' );
            }else{
                $this->db->like( 'buy_transaction_ts', '2015-'.$month.'-'.$day, 'after' );
            }
            
            $query = $this->db->get();
            if($query->num_rows() >= 0) {
                $ret = $query->result_array();
                //var_dump($ret);
            }
            return $ret;
        }
    }

?>