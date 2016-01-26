<?php
class Updatepvuv extends CI_Controller {
    public function __construct()
    {
        parent::__construct(); 
        $this->load->model('updatepvuv_model');
    }
    
    public function index()
    {
        $timeFlag = date("Y-m-d",strtotime("-1 day"));
        //$timeFlag = intval($this->input->get_post('$timeOfPost',true));
        $flag = $this->updatepvuv_model->handle($timeFlag);
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