<?php 
    class Stock_Model extends CI_Model {
        
        function __construct() {
            parent::__construct();
        }

        function sync_stocks ($shop_terminal_id, $item_id, $quantity) {
            $data = array(
                    'shop_terminal_id' => $shop_terminal_id,
                    'item_id' => $item_id,
                    'quantity' => $quantity
                );

            $query = $this->db->query ("SELECT * FROM stock WHERE shop_terminal_id = '{$shop_terminal_id}' AND item_id = '{$item_id}' " );
            if ($query->num_rows() == 1 ) {
                $this->db->query( "UPDATE stock SET quantity = '{$quantity}' WHERE item_id = '{$item_id}' AND '{$shop_terminal_id}'");
            } elseif ( $query->num_rows() == 0 ) {
                $this->db->query( "INSERT INTO stock (shop_terminal_id, item_id, quantity) VALUES ( '{$shop_terminal_id}', '{$item_id}', '{$quantity}' )");
            } else {
                return " Sync failed ";
            }

            return "Sync Successful";
        }   

        function get_stocks_per_item($item_number){
            $query = $this->db->query ("SELECT * FROM stock WHERE item_number = '{$item_number}'");
            if($query->num_rows() > 0) {
                $ret = $query->result();
            } else {
                $ret = 'This item does not exist or is not stocked anywhere.';
            }

            return $ret;
        }
        
        function get_stocks_per_terminal($shop_terminal_id){
            $query = $this->db->query ("SELECT * FROM stock WHERE shop_terminal_id = '{$shop_terminal_id}'");
            if($query->num_rows() > 0) {
                $ret = $query->result();
            } else {
                $ret = 'This shop does not exist or has no stocks.';
            }

            return $ret;
        } 
    }

?>