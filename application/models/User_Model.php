<?php 
    class User_model extends CI_Model {
        
        function __construct() {
            parent::__construct();
        }

        function getUser($id_number) {
            $query = $this->db->query("SELECT * FROM user WHERE ID_Number = '{$id_number}'");
            if($query->num_rows() > 0) {
                $ret = $query->row();
            } else {
                $ret = 'FUCK';
            }

            return $ret;
        }  

        function getUsers() {
            $query = $this->db->query("SELECT * FROM user");
            if($query->num_rows() > 0) {
                $ret = $query->row();
            } else {
                $ret = 'FUCK';
            }

            return $ret;
        }  

        function getBalance($id_number) {
            $query = $this->db->query("SELECT balance FROM user WHERE ID_Number = '{$id_number}'");
            if($query->num_rows() > 0) {
                $ret = $query->row();
            } else {
                $ret = 'FUCK';
            }

            return $ret;
        }

        function setBalance($id_number, $new_balance) {
            $new_balance = floatval($new_balance);
            if ($id_num>0 && $new_balance>0) {
                $query = $this->db->query("UPDATE user SET balance='{$new_balance}' WHERE ID_Number = '{$id_number}'");
                $ret = $this->db->query("SELECT balance FROM user WHERE ID_Number = '{$id_number}'")->row();
            } else {
                $ret = 'FUCK';
            }

            return $ret;
        }      
    }

?>