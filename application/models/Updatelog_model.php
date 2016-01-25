<?php
class Updatelog_model extends CI_Model {

    public function __construct()
    {
       
    }
    
    public function handle()
    {
        
        $flag = 0;
        $num=0;    //用来记录目录下的文件个数
        $dir =  'D:\dev\pvuvlog';
        $dirname = $dir."\\"; //要遍历的目录名字
        echo "dirname is:$dirname:end";
        
        $today = date("Y-m-d",time());
        $yestoday =  date("Y-m-d",strtotime("-1 day"));
        //echo $yestoday;
        
        if (is_dir($dirname)) 
        {
            if ($dh = opendir($dirname))
            {
                while (($file = readdir($dh)) !== false)
                {
                    //echo "filename: $file : filetype: " . filetype($dirname . $file) . "\n";
                    //echo strlen($file);
                    
                    if(strlen($file) > 42)
                    {
                            $num += 1;
                            $dirFile=$dirname.$file;
                            $device_mac = substr($file,9,17);
                            $timeForLog = substr($file,31,10); 
                            echo "mac:$device_mac";
                            echo "time:$timeForLog";                           

                            if( $timeForLog != $yestoday)
                            {
                                echo "!!!!=====";
                                //continue;  //only read yestoday data
                            }

                            $sql_select = "SELECT * from `pvuv-device` WHERE device_mac='{$device_mac}' AND time='{$timeForLog}'";
			                if($this->db->query($sql_select)->result())
			                {
			                    echo "this mac data is exist";
			                    continue;
			                }
			                else
			                {
			                	$file_contents_array = file($dirFile);
			                	/*
			                	$pv = 0;
			                	$download_app_times = 0;
			                	$uv = 0;
			                	$uv_andriod = 0;
			                	$uv_ios = 0;
			                	$uv_windows = 0;
			                	$movie1 = 0;
			                	$movie2 = 0;
			                	$movie3 = 0;
			                	$movie4 = 0;
			                	$movie5 = 0;
			                	$movie6 = 0;
			      			    $movie7 = 0;
			                	$movie8 = 0;
			                	$movie9 = 0;
			                	$movie10 = 0;
			                	*/
			                	$uv = 0;
			                	$logdate = array();
			                	for($i=0;$i<20;$i++)
			                	{
			                		$logdate[$i] = 0;
			                	}

	                            foreach($file_contents_array as $line => $content)
	                            {
	                                 //echo "line:$line content:$content";
	                                 $logdate[$line] = $content;
	                                 //echo "logdata[$line]: $logdate[$line]";
	                                //echo "per_num: $per_num";
	                                //break; //onefile every line
	                            }
	                            $uv = $logdate[2] + $logdate[3] + $logdate[4];
	                            echo "uv:$uv";

	                            // insert into databases;


				            }
                           
                        
                            //fclose($file_handle);
                        break; //every file
                    } //if filename > length
                    
                }// while readdir
                        
                closedir($dh);
            } //if opendir 
        }
    
        return $flag;
    }


}