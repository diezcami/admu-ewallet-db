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

    }

?>