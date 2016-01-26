<?php
class Updatemovie extends CI_Controller {
    public function __construct()
    {
        parent::__construct(); 
        $this->load->model('updatemovie_model');
    }
    
    public function index()
    {
        $timeFlag = date("Y-m-d",strtotime("-1 day"));
        $flag = $this->updatemovie_model->handle($timeFlag);
        if($flag)
        {
            echo "导入失败";
        }
        else
        {
            echo "导入成功";
        }
    }
}