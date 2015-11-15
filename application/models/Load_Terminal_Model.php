<?php 
    class Load_Terminal_Model extends CI_Model {

        /**
         * Error Descriptions:
         * 100: No ID Number found in the Server
         * 300: No users were found in the Server
         */
        
        function __construct() {
            parent::__construct();
        }

        function get_load_terminals(){
            $query = $this->db->query ("SELECT * FROM load_terminal");
            if($query->num_rows() > 0) {
                $ret = $query->result();
            } else {
                $ret = '300';
            }

            return $ret;
        }

        function get_load_terminal($load_terminal_id){
            $query = $this->db->query ("SELECT * FROM user WHERE load_terminal_id = '{$load_terminal_id}'");
            if($query->num_rows() > 0) {
                $ret = $query->result();
            } else {
                $ret = 'A load terminal with this ID number does not exist.';
            }

            return $ret;
        } 
    }

?>