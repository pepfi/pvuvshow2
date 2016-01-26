<?php
class Pvuv_model extends CI_Model {
    public function __construct(){
       parent::__construct();
    }
    
    public function info_nums(){
        return $this->db->count_all('pvuv-device');
    }

    public function deviceinfo($offset, $pagesize){
        $sql = "select * from `pvuv-device`  order by time desc limit $offset,$pagesize";
        
        return $this->db->query($sql)->result_array();
    }
    
    public function detail(){
        $sql = "SELECT pv,uv,updatetime FROM `pvuv-total`";           
        
        return $this->db->query($sql)->result_array();
    }
    
}