<?php
class Updatepvuv_model extends CI_Model {

    public function __construct()
    {
       
    }
    
    public function handle($timeFlag)
    {
        $flag = 0;
        $data = $this->db->query("SELECT * from `pvuv-device` WHERE time = '{$timeFlag}' ")->result_array();
        $pv_total = 0;
        $uv_total = 0;
        $download_app_times_total = 0;
        $uv_android_total = 0;
        $uv_ios_total = 0;
        $uv_windows_total = 0;
        $uv_others_total = 0;
        foreach($data as $row)
        {
            $pv_total += $row['pv'];
            $uv_total += $row['uv'];
            $download_app_times_total += $row['download_app_times'];
            $uv_android_total += $row['uv_android'];
            $uv_ios_total += $row['uv_ios'];
            $uv_windows_total += $row['uv_windows'];
            $uv_others_total += $row['uv_others'];
        }
        $sql_update = "UPDATE `pvuv-total` set pv = {$pv_total},download_app_times = {$download_app_times_total},uv = {$uv_total},uv_android = {$uv_android_total},uv_ios = {$uv_ios_total},uv_windows = {$uv_windows_total},uv_others = {$uv_others_total} WHERE updatetime = '{$timeFlag}'";
        $sql_insert = "INSERT INTO `pvuv-total` (pv,download_app_times,uv,uv_android,uv_ios,uv_windows,uv_others,updatetime) VALUES ({$pv_total},{$download_app_times_total},{$uv_total},{$uv_android_total},{$uv_ios_total},{$uv_windows_total},{$uv_others_total},'{$timeFlag}')";
        if($this->db->query("SELECT * from `pvuv-total` WHERE updatetime = '{$timeFlag}'")->num_rows())
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
        return $flag;
    }
     
}