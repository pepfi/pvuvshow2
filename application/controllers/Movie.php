<?php
class Movie extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('movie_model');
        $this->load->library('pagination');
    }
    
    public function page(){
        $config['base_url'] = base_url('/movie/index/');;
        $config['total_rows'] = $this->movie_model->info_nums();
        $config['per_page'] = 5;
        $config['first_link'] = '首页';        
        $config['last_link'] = '尾页';
        $config['prev_link'] = '上一页'; 
        $config['next_link'] = '下一页';
        $config['cur_tag_open'] = "<div style='display:block;width:20px;height:20px;float:left;background:#337ab7;color:white;text-align:center'>";
        $config['cur_tag_close'] = '</div>';
        $config['num_tag_open'] = "<div style='display:block;width:20px;height:20px;float:left;text-align:center'>";
        $config['num_tag_close'] = '</div>';         
        $this->pagination->initialize($config);
        
        $data['page'] = $this->pagination->create_links();
        
        $offset = ($this->uri->segment(3) == null)?0:$this->uri->segment(3);
        $pageSize = $config['per_page'];
        $data['deviceinfo'] = $this->movie_model->deviceinfo($offset, $pageSize);
        $this->load->vars($data);
    }
    
    function movie_name(){
        $data['movie_0_name'] = "惊天魔盗团";
        $data['movie_1_name'] = "特警判官";
        $data['movie_2_name'] = "澳门风云2";
        $data['movie_3_name'] = "暴风雨";
        $data['movie_4_name'] = "匆匆那年";
        $data['movie_5_name'] = "撒娇女人最好命";
        $data['movie_6_name'] = "白发魔女传";
        $data['movie_7_name'] = "星际穿越";
        $data['movie_8_name'] = "一触即发";
        $data['movie_9_name'] = "大话天仙";
        $this->load->vars($data);
    }
    
    function movie_init(){
        for($i = 0; $i < 30; $i++){
            $data["movie_".$i."_pv_six_days_ago"] = 0;
            $data["movie_".$i."_pv_five_days_ago"] = 0;
            $data["movie_".$i."_pv_four_days_ago"] = 0;
            $data["movie_".$i."_pv_three_days_ago"] = 0;
            $data["movie_".$i."_pv_two_days_ago"] = 0;
            $data["movie_".$i."_pv_yesterday"] = 0;
            $data["movie_".$i."_pv_today"] = 0;
        }
        $this->load->vars($data);
    }
    
    function movie_result($movie_name, $movie_time, $movie_times){
        switch($movie_name){
            case "0":
                $data['movie_0_pv'.$movie_time] = $movie_times;
                break;
            case "1":
                $data['movie_1_pv'.$movie_time] = $movie_times;
                break;
            case "2":
                $data['movie_2_pv'.$movie_time] = $movie_times;
                break;
            case "3":
                $data['movie_3_pv'.$movie_time] = $movie_times;
                break;
            case "4":
                $data['movie_4_pv'.$movie_time] = $movie_times;
                break;
            case "5":
                $data['movie_5_pv'.$movie_time] = $movie_times;
                break;
            case "6":
                $data['movie_6_pv'.$movie_time] = $movie_times;
                break;
            case "7":
                $data['movie_7_pv'.$movie_time] = $movie_times;
                break;
            case "8":
                $data['movie_8_pv'.$movie_time] = $movie_times;
                break;
            case "9":
                $data['movie_9_pv'.$movie_time] = $movie_times;
                break;
            default:
//                echo "错误";
            break;
        }
        $this->load->vars($data);
    } 
    
    function movie_time($movie_name, $movie_time, $movie_times){
        switch($movie_time){
            case date('Y-m-d', strtotime('-6 day')):
                $this->movie_result($movie_name, "_six_days_ago", $movie_times);
                break;
            case date('Y-m-d', strtotime('-5 day')):
                $this->movie_result($movie_name, "_five_days_ago", $movie_times);
                break;
            case date('Y-m-d', strtotime('-4 day')):
                $this->movie_result($movie_name, "_four_days_ago", $movie_times);
                break;
            case date('Y-m-d', strtotime('-3 day')):
                $this->movie_result($movie_name, "_three_days_ago", $movie_times);
                break;
            case date('Y-m-d', strtotime('-2 day')):
                $this->movie_result($movie_name, "_two_days_ago", $movie_times);
                break;
            case date('Y-m-d', strtotime('-1 day')):
                $this->movie_result($movie_name, "_yesterday", $movie_times);
                break;
            case date('Y-m-d', time()):
                $this->movie_result($movie_name, "_today", $movie_times);
                break;
            default:
//                echo "错误";
        }
    }
    
    public function index(){
        
        $this->page();
        
        $data['home_nav_class'] = "";
        $data['device_nav_class'] = '';
        $data['user_nav_class'] = '';
        $data['log_nav_class'] = '';
        $data['pvuv_nav_class'] = '';
        $data['movie_nav_class'] = "class='active'";
        
        $data['movie_info'] = $this->movie_model->get_movies();
        
        $this->movie_init();
        $this->movie_name();
        
        date_default_timezone_set('PRC'); 
        foreach($data['movie_info'] as $num){
            $this->movie_time($num['movie_name'], $num['updatetime'], $num['movie_play_total']);
        }

        $this->load->view('admin/header', $data);
        $this->load->view('admin/movie', $data);
        $this->load->view('admin/footer');        
    }
}