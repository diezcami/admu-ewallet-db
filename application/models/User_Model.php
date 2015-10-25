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
    }

?>