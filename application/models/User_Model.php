<?php 
    class User_model extends CI_Model {

        /**
         * Error Descriptions:
         * 100: No ID Number found in the Server
         * 300: No users were found in the Server
         */
        
        function __construct() {
            parent::__construct();
        }

        function get_users() {
            $query = $this->db->query("SELECT * FROM user");
            if($query->num_rows() > 0) {
                $ret = $query;
            } else {
                $ret = '300';
            }

            return $ret;
        }

        function get_balance($id_number) {
            $query = $this->db->query("SELECT balance FROM user WHERE ID_Number = '{$id_number}'");
            if($query->num_rows() > 0) {
                $ret = $query->row();
            } else {
                $ret = '100';
            }

            return $ret;
        }

        function set_balance($id_number, $new_balance) {
            $new_balance = floatval($new_balance);
            if ($id_number>0 && $new_balance>0) {
                $query = $this->db->query("UPDATE user SET balance='{$new_balance}' WHERE ID_Number = '{$id_number}'");
                $ret = $this->db->query("SELECT balance FROM user WHERE ID_Number = '{$id_number}'")->row();
            } else {
                $ret = '100';
            }

            return $ret;
        }      
    }

?>