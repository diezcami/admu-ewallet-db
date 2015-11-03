<?php 
    class Stock_Model extends CI_Model {
        
        function __construct() {
            parent::__construct();
        }

        function sync_stocks ($shop_terminal_id, $item_id, $stock_ts, $quantity) {
            $data = array(
                    'shop_terminal_id' => $shop_terminal_id,
                    'item_id' => $item_id,
                    //'stock_ts' => $stock_ts,
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

    }

?>