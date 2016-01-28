<?php
class Updatelog extends CI_Controller {
    public function __construct()
    {
        parent::__construct(); 
        $this->load->model('updatelog_model');
    }
    
    public function index()
    {
        $flag = $this->updatelog_model->handle();
        //echo "flag:$flag";
//        if($flag)
//        {
//            echo "瀵煎叆澶辫触";
//        }
//        else
//        {
//            echo "瀵煎叆鎴愬姛";
//        }
    }
}