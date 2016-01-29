<?php
class Movie_model extends CI_Model{
     public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function info_nums(){
        return $this->db->count_all('movie-times');
    }
    
    public function deviceinfo($offset, $pagesize){
        $sql = "select * from `movie-times` order by time desc limit $offset,$pagesize";
        
        return $this->db->query($sql)->result_array();
    } 
    
    public function to_excel(){
        $sql = "select * from `movie-times`";
        
        return $this->db->query($sql)->result_array();
    }     
    
    public function get_movies() {
        $query = $this->db->query("select updatetime, movie_name, movie_play_total from `movie-total` order by updatetime desc");
        
        return $query->result_array();
    }   
}
