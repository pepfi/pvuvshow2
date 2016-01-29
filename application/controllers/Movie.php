<?php
class Movie extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('movie_model');
        $this->load->library('pagination');
        $this->load->helper('download');
    }

    //download excel
    public function to_excel(){
        $data['detailinfo'] = $this->movie_model->to_excel(); 
        $movie_excel_string = "\xEF\xBB\xBF"."device_mac".", "."sn".", "."time".", "."movie_name".", "."movie_play_time"."\n";
        foreach($data['detailinfo'] as $val){
            switch($val['movie_name']){
                case '0';
                    $movie_name = "惊天魔盗团";
                    break;
                case '1';
                    $movie_name = "特警判官";
                    break;
                case '2';
                    $movie_name = "澳门风云2";
                    break;
                case '3';
                    $movie_name = "暴风雨";
                    break;
                case '4';
                    $movie_name = "匆匆那年";
                    break; 
                case '5';
                    $movie_name = "撒娇女人最好命";
                    break;
                case '6';
                    $movie_name = "白发魔女传";
                    break;
                case '7';
                    $movie_name = "星际穿越";
                    break;
                case '8';
                    $movie_name = "一触即发";
                    break;
                case '9';
                    $movie_name = "大话天仙";
                    break;
                case '10';
                    $movie_name = "夺命追踪";
                    break;
                case '11';
                    $movie_name = "背水一战";
                    break;
                case '12';
                    $movie_name = "雅典娜无间碟局";
                    break;
                case '13';
                    $movie_name = "妙笔生花";
                    break;
                case '14';
                    $movie_name = "单刀直入";
                    break; 
                case '15';
                    $movie_name = "欲望爱人";
                    break;
                case '16';
                    $movie_name = "超级8";
                    break;
                case '17';
                    $movie_name = "冲上云霄";
                    break;
                case '18';
                    $movie_name = "北方之战";
                    break;
                case '19';
                    $movie_name = "铁血娇娃";
                    break;
                case '20';
                    $movie_name = "窃听风云";
                    break;
                case '21';
                    $movie_name = "放手爱";
                    break;
                case '22';
                    $movie_name = "冲锋战警";
                    break;
                case '23';
                    $movie_name = "一座城池";
                    break;
                case '24';
                    $movie_name = "这个杀手不太冷";
                    break; 
                case '25';
                    $movie_name = "禁闭岛";
                    break;
                case '26';
                    $movie_name = "特种部队";
                    break;
                case '27';
                    $movie_name = "变形金刚2";
                    break;
                case '28';
                    $movie_name = "碟中谍3";
                    break;
                case '29';
                    $movie_name = "捕蝇纸";
                    break;
            }
            
            $movie_excel_string .= $val['device_mac'].", ".$val['sn'].", ".$val['time'].", ".$movie_name
                               .", ".$val['movie_play_times']."\n";             
        }
        
        $download_file = "movie_excel.csv";
        force_download($download_file, $movie_excel_string);
    }
     
    //per page shows nums given    
    public function nums_per_page(){        
        if($this->uri->segment(4)){
            switch($this->uri->segment(4)){
                case 20:
                    $this->session->set_userdata('movie_pageSize',20);
                    break;
                case 50:
                    $this->session->set_userdata('movie_pageSize',50);
                    break;
                case 100:
                    $this->session->set_userdata('movie_pageSize',100);
                    break;
            }        
        }        
    }
    
    public function page($method, $movie_nums){
        $config['base_url'] = base_url("/movie/".$method."/");
        $config['total_rows'] = $movie_nums;        
        if($this->session->userdata('movie_pageSize')){//Url increasing span
            $config['per_page'] = $this->session->userdata('movie_pageSize');    
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
          
        $this->session->set_userdata('movie_offset', $offset);
        $this->session->set_userdata('movie_final_pagesize', $pageSize);
        $this->load->vars($data);
    }
    
    public function movie_name(){
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
        $data['movie_10_name'] = "夺命追踪";
        $data['movie_11_name'] = "背水一战";
        $data['movie_12_name'] = "雅典娜无间碟局";
        $data['movie_13_name'] = "妙笔生花";
        $data['movie_14_name'] = "单刀直入";
        $data['movie_15_name'] = "欲望爱人";
        $data['movie_16_name'] = "超级8";
        $data['movie_17_name'] = "冲上云霄";
        $data['movie_18_name'] = "北方之战";
        $data['movie_19_name'] = "铁血娇娃";
        $data['movie_20_name'] = "窃听风云";
        $data['movie_21_name'] = "放手爱";
        $data['movie_22_name'] = "冲锋战警";
        $data['movie_23_name'] = "一座城池";
        $data['movie_24_name'] = "这个杀手不太冷";
        $data['movie_25_name'] = "禁闭岛";
        $data['movie_26_name'] = "特种部队";
        $data['movie_27_name'] = "变形金刚2";
        $data['movie_28_name'] = "碟中谍3";
        $data['movie_29_name'] = "捕蝇纸";

               
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
            case "10":
                $data['movie_10_pv'.$movie_time] = $movie_times;
                break;
            case "11":
                $data['movie_11_pv'.$movie_time] = $movie_times;
                break;
            case "12":
                $data['movie_12_pv'.$movie_time] = $movie_times;
                break;
            case "13":
                $data['movie_13_pv'.$movie_time] = $movie_times;
                break;
            case "14":
                $data['movie_14_pv'.$movie_time] = $movie_times;
                break;
            case "15":
                $data['movie_15_pv'.$movie_time] = $movie_times;
                break;
            case "16":
                $data['movie_16_pv'.$movie_time] = $movie_times;
                break;
            case "17":
                $data['movie_17_pv'.$movie_time] = $movie_times;
                break;
            case "18":
                $data['movie_18_pv'.$movie_time] = $movie_times;
                break;
            case "19":
                $data['movie_19_pv'.$movie_time] = $movie_times;
                break;
            case "20":
                $data['movie_20_pv'.$movie_time] = $movie_times;
                break;
            case "21":
                $data['movie_21_pv'.$movie_time] = $movie_times;
                break;
            case "22":
                $data['movie_22_pv'.$movie_time] = $movie_times;
                break;
            case "23":
                $data['movie_23_pv'.$movie_time] = $movie_times;
                break;
            case "24":
                $data['movie_24_pv'.$movie_time] = $movie_times;
                break;
            case "25":
                $data['movie_25_pv'.$movie_time] = $movie_times;
                break;
            case "26":
                $data['movie_26_pv'.$movie_time] = $movie_times;
                break;
            case "27":
                $data['movie_27_pv'.$movie_time] = $movie_times;
                break;
            case "28":
                $data['movie_28_pv'.$movie_time] = $movie_times;
                break;
            case "29":
                $data['movie_29_pv'.$movie_time] = $movie_times;
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
        
        $this->nums_per_page();
        if(!$this->session->userdata('movie_nums')){//run one time
            $data['movie_nums']= $this->movie_model->info_nums();
            $this->session->set_userdata('movie_nums', $data['movie_nums']);
        }
        else{//run from second time
            $data['movie_nums'] = $this->session->userdata('movie_nums');
        }
        $this->page("index", $data['movie_nums']);
        
        $data['deviceinfo'] = $this->movie_model->deviceinfo($this->session->userdata('movie_offset'), $this->session->userdata('movie_final_pagesize'));
        
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

        $data['controller'] = 'movie';
        $data['method'] = "index";//for link
        
        $this->load->view('admin/header', $data);
        $this->load->view('admin/movie', $data);
        $this->load->view('admin/footer');        
    }
}