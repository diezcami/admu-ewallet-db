<?php 
    class Item_Order_Model extends CI_Model {
        
        function __construct() {
            parent::__construct();
        }

        function sync_item_orders ($buy_transaction_id, $item_id, $quantity) {
            $data = array(
                    'buy_transaction_id' => $buy_transaction_id,
                    'item_id' => $item_id,
                    'quantity' => $quantity
                );
            $this->db->insert('item_order', $data);

            return "Sync Successful";
        }   

        function get_report( $shop_terminal, $month, $day=0 ){
            $query = $this->db->query("SELECT * FROM buy_transaction WHERE shop_terminal_id = '{$shop_terminal}' AND buy_transaction_ts LIKE '2015-{$month}%' ");
            if($query->num_rows() > 0) {
                $ret = $query->result();
            }
            return $ret;
        }

    }

?>