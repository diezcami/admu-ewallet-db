<?php 
    class Item_Model extends CI_Model {
        
        /**
         * Error Descriptions:
         * 200: No items were found in the Server
         */
        
        function __construct() {
            parent::__construct();
        }

        function get_items() {
            $query = $this->db->query("SELECT * FROM item");
            if($query->num_rows() > 0) {
                $ret = $query->results();
            } else {
                $ret = '200';
            }

            return $ret;
        }
          
    }

?>