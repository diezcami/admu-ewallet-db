<?php 
    class Shop_Terminal_Model extends CI_Model {

        /**
         * Error Descriptions:
         * 100: No ID Number found in the Server
         * 300: No users were found in the Server
         */
        
        function __construct() {
            parent::__construct();
        }

        function get_shop_terminals(){
            $query = $this->db->query ("SELECT * FROM shop_terminal");
            if($query->num_rows() > 0) {
                $ret = $query->result();
            } else {
                $ret = '300';
            }

            return $ret;
        }

        function add_shop_terminal ($pin) {  
            $this->db->query( "INSERT INTO shop_terminal (balance, pin) VALUES ( 0, '{$pin}' )");
            return "Ok";
        }

        function get_shop_terminal_pin($shop_terminal_id){
            $query = $this->db->query ("SELECT pin FROM shop_terminal WHERE shop_terminal_id = '{$shop_terminal_id}'");
            if($query->num_rows() > 0) {
                $ret = $query->result();
            } else {
                $ret = 'A shop terminal with this ID number does not exist.';
            }

            return $ret;
        }

        function get_shop_terminal($shop_terminal_id){
            $query = $this->db->query ("SELECT * FROM shop_terminal WHERE shop_terminal_id = '{$shop_terminal_id}'");
            if($query->num_rows() > 0) {
                $ret = $query->result();
            } else {
                $ret = 'A shop terminal with this ID number does not exist.';
            }

            return $ret;
        }

        function update_shop_terminal($id, $pin, $balance){
            $this->db->query( "UPDATE shop_terminal SET balance = '{$balance}', pin = '{$pin}' WHERE shop_terminal_id = '{$id}'");
        }
    }

?>