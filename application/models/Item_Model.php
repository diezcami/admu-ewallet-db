<?php 
    class Item_Model extends CI_Model {
        
        /**
         * Error Descriptions:
         * 200: No items were found in the Server
         */
        
        function __construct() {
            parent::__construct();
        }

        /*
            NOT USED, UNTESTED
         */
        function sync_items ($item_id, $item_name, $item_price) {
            $data = array(
                    'item_id' => $item_id,
                    'item_name' => $item_name,
                    'item_price' => $item_price
                );

            $query = $this->db->query ("SELECT * FROM item WHERE item_id = '{$item_id}'" );
            if ($query->num_rows() == 1 ) {
                $this->db->query( "UPDATE item SET item_name = '{$item_name}' WHERE item_id = '{$item_id}' AND '{$shop_terminal_id}'");
            } elseif ( $query->num_rows() == 0 ) {
                $this->db->query( "INSERT INTO item (item_name, item_price) VALUES ( '{$item_name}', '{$item_price}' )");
            } else {
                return " Sync failed ";
            }

            return "Sync Successful";
        }   

        function add_item ($item_name, $item_price) {        
            $this->db->query( "INSERT INTO item (item_name, item_price) VALUES ( '{$item_name}', '{$item_price}' )");
            return "Ok";
        }

        function get_items() {
            $query = $this->db->query("SELECT * FROM item");
            if($query->num_rows() > 0) {
                $ret = $query->result();
            } else {
                $ret = '200';
            }
            return $ret;
        }
 
        function get_item($item_id){
            $query = $this->db->query ("SELECT * FROM item WHERE item_id = '{$item_id}'");
            if($query->num_rows() > 0) {
                $ret = $query->result();
            } else {
                $ret = 'An item with this ID does not exist.';
            }

            return $ret;
        } 

        function update_item($id, $name, $price){
            $this->db->query( "UPDATE item SET item_name = '{$name}', item_price = '{$price}' WHERE item_id = '{$id}'");
        }
    }
?>