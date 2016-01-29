<?php
class Pvuv extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('pvuv_model');
        $this->load->helper('url'); 
        $this->load->library('pagination');
        $this->load->helper('download');
    }
  
    //download excel
    public function to_excel(){
        $data['detail'] = $this->pvuv_model->to_excel(); 
        $pvuv_excel_string = "\xEF\xBB\xBF"."device_mac".", "."sn".", "."time".", "."pv".", "."download_app_times".", "."uv".", "."uv_android".", "."uv_ios".", "."uv_windows".", "."uv_others\n";
        foreach($data['detail'] as $val){
            $pvuv_excel_string .= $val['device_mac'].", ".$val['sn'].", ".$val['time'].", ".$val['pv']
                               .", ".$val['download_app_times'].", ".$val['uv'].", ".$val['uv_android']
                               .", ".$val['uv_ios'].",".$val['uv_windows'].", ".$val['uv_others']."\n";             
        }
        
        $download_file = "pvuv_excel.csv";
        force_download($download_file, $pvuv_excel_string);
    }
    
    //per page shows nums given    
    public function nums_per_page(){        
        if($this->uri->segment(4)){
            switch($this->uri->segment(4)){
                case 20:
                    $this->session->set_userdata('pvuv_pageSize',20);
                    break;
                case 50:
                    $this->session->set_userdata('pvuv_pageSize',50);
                    break;
                case 100:
                    $this->session->set_userdata('pvuv_pageSize',100);
                    break;
            }        
        }        
    }
    
    public function page($method, $pvuv_nums){
        $config['base_url'] = base_url("/pvuv/".$method."/");
        $config['total_rows'] = $pvuv_nums;        
        if($this->session->userdata('pvuv_pageSize')){//Url increasing span
            $config['per_page'] = $this->session->userdata('pvuv_pageSize');    
        }else {
            $config['per_page'] = 20; //default nums per page       
        }        
        $config['first_link'] = '首页';        
        $config['last_link'] = '尾页';
        $config['prev_link'] = '上一页'; 
        $config['next_link'] = '下一页';
        $config['cur_tag_open'] = "<div style='display:block;width:40px;height:20px;float:left;background:#337ab7;color:white;text-align:center'>";
        $config['cur_tag_close'] = '</div>';
        $config['num_tag_open'] = "<div style='display:block;width:40px;height:20px;float:left;text-align:center'>";
        $config['num_tag_close'] = '</div>';        
        $this->pagination->initialize($config);        
        $data['page'] = $this->pagination->create_links();
        
        if($this->uri->segment(3) == 'per_page'){//offset of data start
            $offset = 0;
        }else {
            $offset = ($this->uri->segment(3) == null)?0:$this->uri->segment(3);
        }
        $pageSize = $config['per_page'];//the number of data each page 
        
        $this->session->set_userdata('pvuv_offset', $offset);
        $this->session->set_userdata('pvuv_final_pagesize', $pageSize);
        $this->load->vars($data);
    }
    
    public function index(){

        $this->nums_per_page();
        if(!$this->session->userdata('pvuv_nums')){//run one time
            $data['pvuv_nums']= $this->pvuv_model->info_nums();
            $this->session->set_userdata('pvuv_nums', $data['pvuv_nums']);
        }
        else{//run from second time
            $data['pvuv_nums'] = $this->session->userdata('pvuv_nums');
        }
        $this->page("index", $data['pvuv_nums']);
        
        $data['deviceinfo'] = $this->pvuv_model->deviceinfo($this->session->userdata('pvuv_offset'), $this->session->userdata('pvuv_final_pagesize'));
        
        $data['home_nav_class'] = "";
        $data['device_nav_class'] = "";
        $data['user_nav_class'] = "";
        $data['log_nav_class'] = "";
        $data['pvuv_nav_class'] = "class='active'";
        $data['movie_nav_class'] = "";
        
        $data['detail'] = $this->pvuv_model->detail(); 
        $data['totalpv'] = 0;$data['totaluv'] = 0;   
        date_default_timezone_set('PRC');
        $six_days_ago = date('Y-m-d', strtotime('-6 day'));
        $five_days_ago = date('Y-m-d', strtotime('-5 day'));
        $four_days_ago = date('Y-m-d', strtotime('-4 day'));
        $three_days_ago = date('Y-m-d', strtotime('-3 day'));
        $two_days_ago = date('Y-m-d', strtotime('-2 day'));
        $yesterday = date('Y-m-d', strtotime('-1 day'));
        $today = date('Y-m-d', time());
        $data['pv']['six_days_ago'] = 0;
        $data['pv']['five_days_ago'] = 0;
        $data['pv']['four_days_ago'] = 0;
        $data['pv']['three_days_ago'] = 0;
        $data['pv']['two_days_ago'] = 0;
        $data['pv']['yesterday'] = 0;
        $data['pv']['today'] = 0;
        $data['uv']['six_days_ago'] = 0;
        $data['uv']['five_days_ago'] = 0;
        $data['uv']['four_days_ago'] = 0;
        $data['uv']['three_days_ago'] = 0;
        $data['uv']['two_days_ago'] = 0;
        $data['uv']['yesterday'] = 0;
        $data['uv']['today'] = 0;
        foreach($data['detail'] as $num1){
            switch($num1['updatetime']){
                case $six_days_ago;
                    $data['pv']['six_days_ago'] = $num1['pv'];
                    $data['uv']['six_days_ago'] = $num1['uv'];
                    break;
                case $five_days_ago;
                    $data['pv']['five_days_ago'] = $num1['pv'];
                    $data['uv']['five_days_ago'] = $num1['uv'];
                    break;
                case $four_days_ago;
                    $data['pv']['four_days_ago'] = $num1['pv'];
                    $data['uv']['four_days_ago'] = $num1['uv'];
                    break;
                case $three_days_ago;
                    $data['pv']['three_days_ago'] = $num1['pv'];
                    $data['uv']['three_days_ago'] = $num1['uv'];
                    break;
                case $two_days_ago;
                    $data['pv']['two_days_ago'] = $num1['pv'];
                    $data['uv']['two_days_ago'] = $num1['uv'];
                    break;
                case $yesterday;
                    $data['pv']['yesterday'] = $num1['pv'];
                    $data['uv']['yesterday'] = $num1['uv'];
                    break;
                case $today;
                    $data['pv']['today'] = $num1['pv'];
                    $data['uv']['today'] = $num1['uv'];                
                    break;
                default:
                    break;
            }
            $data['totalpv'] = $num1['pv'] + $data['totalpv'];
            $data['totaluv'] = $num1['uv'] + $data['totaluv'];
        }

        $data['controller'] = 'pvuv';
        $data['method'] = "index";//for link
        
        $this->load->view('admin/header', $data);
        $this->load->view('admin/pvuv', $data);
        $this->load->view('admin/footer');
    }    
}