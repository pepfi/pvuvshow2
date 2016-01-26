<?php
class Updatemovie_model extends CI_Model {

    public function __construct()
    {
       
    }
    
    public function handle($timeFlag)
    {
        $flag = 0;
        for($i = 0;$i<30;$i++)
        {
            $data = $this->db->query("SELECT * from `movie-times` WHERE time = '{$timeFlag}' AND movie_name = '{$i}'")->result_array();
            $movie_play_total = 0;
            foreach($data as $row)
            {
                $movie_play_total += $row['movie_play_times'];
            }
            $sql_update = "UPDATE `movie-total` set movie_name = {$i},movie_play_total = {$movie_play_total},updatetime = '{$timeFlag}'";
            $sql_insert = "INSERT INTO `movie-total` (movie_name,movie_play_total,updatetime) VALUES ({$i},{$movie_play_total},'{$timeFlag}')";
            if($this->db->query("SELECT * from `movie-total` WHERE updatetime = '{$timeFlag}' AND movie_name = '{$i}'")->num_rows())
            {
                $query = $this->db->query($sql_update);
                if(!$query)
                {
                    $flag = 1;
                }
            }
            else
            {
                $query = $this->db->query($sql_insert);
                if(!$query)
                {
                    $flag = 1;
                }
            }
        }
        return $flag;
    }
     
}