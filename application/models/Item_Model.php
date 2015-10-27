<?php 
    class Item_Model extends CI_Model {
        
        /**
         * Error Descriptions:
         * 200: No Item ID found in Server DB
         */
        
        function __construct() {
            parent::__construct();
        }

        function get_item($item_id) {
            $query = $this->db->query("SELECT * FROM item WHERE Item_ID = '{$item_id}'");
            if($query->num_rows() > 0) {
                $ret = $query->row();
            } else {
                $ret = '200';
            }

            return $ret;
        }
          
    }

?>