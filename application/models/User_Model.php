<?php 
    class User_model extends CI_Model {
        
        function __construct() {
            parent::__construct();
        }

        function getUser($id_num) {
            $query = $this->db->query("SELECT * FROM user WHERE ID_Number = '{$id_num}'");
            if($query->num_rows() > 0) {
                $ret = $query->row();
            } else {
                $ret = 'FUCK';
            }

            return $ret;
        }  

        function getBalance($id_num) {
            $query = $this->db->query("SELECT balance FROM user WHERE ID_Number = '{$id_num}'");
            if($query->num_rows() > 0) {
                $ret = $query->row();
            } else {
                $ret = 'FUCK';
            }

            return $ret;
        }

        function setBalance($id_num, $new_balance) {
            $new_balance = floatval($new_balance);
            if ($id_num>0 && $new_balance>0) {
                $query = $this->db->query("UPDATE user SET balance='{$new_balance}' WHERE ID_Number = '{$id_num}'");
                $ret = $this->db->query("SELECT balance FROM user WHERE ID_Number = '{$id_num}'")->row();
            } else {
                $ret = 'FUCK';
            }

            return $ret;
        }
        /*
        returns all the users
        */
        function getUsers(){
            $query = $this->db->query("SELECT * from user");
            if( $query->num_rows()>0 ){
                $ret = $query->result();
            }else{
                $ret = 'FUCK';
            }
            return $ret;
        }      
    }

?>