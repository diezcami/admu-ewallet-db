<?php 
    class User_Model extends CI_Model {

        /**
         * Error Descriptions:
         * 100: No ID Number found in the Server
         * 300: No users were found in the Server
         */
        
        function __construct() {
            parent::__construct();
        }

        function get_balance($id_number) {
            $query = $this->db->query("SELECT balance FROM user WHERE id_number = '{$id_number}'");
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
                $query = $this->db->query("UPDATE user SET balance='{$new_balance}' WHERE id_number = '{$id_number}'");
                $ret = $this->db->query("SELECT balance FROM user WHERE id_number = '{$id_number}'")->row();
            } else {
                $ret = '100';
            }

            return $ret;
        }

        function get_users(){
            $query = $this->db->query ("SELECT * FROM user");
            if($query->num_rows() > 0) {
                $ret = $query->result();
            } else {
                $ret = '300';
            }

            return $ret;
        }

        function get_user($id_number){
            $query = $this->db->query ("SELECT * FROM user WHERE id_number = '{$id_number}'");
            if($query->num_rows() > 0) {
                $ret = $query->result();
            } else {
                $ret = 'A user with this ID number does not exist.';
            }

            return $ret;
        } 
    }

?>