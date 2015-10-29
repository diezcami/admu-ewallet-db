<?php 
    class Stock_Model extends CI_Model {
        
        function __construct() {
            parent::__construct();
        }

        function sync_stocks ($shop_terminal_id, $item_id, $stock_ts) {
            $data = array(
                    'shop_terminal_id' => $shop_terminal_id,
                    'item_id' => $item_id,
                    'stock_ts' => $stock_ts
                );
            $this->db->insert('stock', $data);

            return "Sync Successful";
        }   

    }

?>
