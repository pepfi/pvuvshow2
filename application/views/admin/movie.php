<script src="/application/views/global/custom/js/esl.js"></script>
<div id="chart0" style="width:370px;height:250px;border:1px solid #ccc;float:left"></div>
<div id="chart1" style="width:370px;height:250px;border:1px solid #ccc;float:left;margin-left:10px"></div>
<div id="chart2" style="width:370px;height:250px;border:1px solid #ccc;float:left;margin-left:10px"></div>
<div id="chart3" style="width:370px;height:250px;border:1px solid #ccc;float:left;margin-top:10px;"></div>
<div id="chart4" style="width:370px;height:250px;border:1px solid #ccc;float:left;margin-left:10px;margin-top:10px;"></div>
<div id="chart5" style="width:370px;height:250px;border:1px solid #ccc;float:left;margin-left:10px;margin-top:10px;"></div>
<?php
    date_default_timezone_set('PRC');
    $six_days_ago = "'".date('y-m-d', strtotime('-6 day'))."'";
    $five_days_ago = "'".date('y-m-d', strtotime('-5 day'))."'";
    $four_days_ago = "'".date('y-m-d', strtotime('-4 day'))."'";
    $three_days_ago = "'".date('y-m-d', strtotime('-3 day'))."'";
    $two_days_ago = "'".date('y-m-d', strtotime('-2 day'))."'";
    $yesterday = "'".date('y-m-d', strtotime('-1 day'))."'";
    $today = "'".date('y-m-d', time())."'";

    echo 
        "<script type='text/javascript'>
        require.config({
            paths:{ 
                echarts:'/application/views/global/custom/js/echarts'
            }
        });
    
        require(
            ['echarts'],
            function(ec) {
                var myChart = ec.init(document.getElementById('chart0'));
                var option = {
                    tooltip : {
                        trigger: 'axis'
                    },
                    legend: {
                        data:['".$movie_0_name."','".$movie_1_name."','".$movie_2_name."','".$movie_3_name."','".$movie_4_name."']
                    },

                    xAxis : [
                        {
                            type : 'category',
                            data : [".$six_days_ago.", ".$five_days_ago.", ".$four_days_ago.", ".$three_days_ago.", ".$two_days_ago.", ".$yesterday.", ".$today."]
                        }
                    ],
                    yAxis : [
                        {
                            type : 'value',
                            splitArea : {show : true}
                        }
                    ],
                    series : [
                        {
                            name:'".$movie_0_name."',
                            type:'line',
                            data:[".$movie_0_pv_six_days_ago.", ".$movie_0_pv_five_days_ago.", ".$movie_0_pv_four_days_ago.", ".$movie_0_pv_three_days_ago.", ".$movie_0_pv_two_days_ago.", ".$movie_0_pv_yesterday.", ".$movie_0_pv_today."]
                        },
                        {
                            name:'".$movie_1_name."',
                            type:'line',
                            data:[".$movie_1_pv_six_days_ago.", ".$movie_1_pv_five_days_ago.", ".$movie_1_pv_four_days_ago.", ".$movie_1_pv_three_days_ago.", ".$movie_1_pv_two_days_ago.", ".$movie_1_pv_yesterday.", ".$movie_1_pv_today."]
                        },
                        {
                            name:'".$movie_2_name."',
                            type:'line',
                            data:[".$movie_2_pv_six_days_ago.", ".$movie_2_pv_five_days_ago.", ".$movie_2_pv_four_days_ago.", ".$movie_2_pv_three_days_ago.", ".$movie_2_pv_two_days_ago.", ".$movie_2_pv_yesterday.", ".$movie_2_pv_today."]
                        },
                        {
                            name:'".$movie_3_name."',
                            type:'line',
                            data:[".$movie_3_pv_six_days_ago.", ".$movie_3_pv_five_days_ago.", ".$movie_3_pv_four_days_ago.", ".$movie_3_pv_three_days_ago.", ".$movie_3_pv_two_days_ago.", ".$movie_3_pv_yesterday.", ".$movie_3_pv_today."]
                        },
                        {
                            name:'".$movie_4_name."',
                            type:'line',
                            data:[".$movie_4_pv_six_days_ago.", ".$movie_4_pv_five_days_ago.", ".$movie_4_pv_four_days_ago.", ".$movie_4_pv_three_days_ago.", ".$movie_4_pv_two_days_ago.", ".$movie_4_pv_yesterday.", ".$movie_4_pv_today."]
                        }

                    ]
                };
                
                myChart.setOption(option);
            }
        );
        </script>";


    echo 
        "<script type='text/javascript'>
        require.config({
            paths:{ 
                echarts:'/application/views/global/custom/js/echarts'
            }
        });
    
        require(
            ['echarts'],
            function(ec) {
                var myChart = ec.init(document.getElementById('chart1'));
                var option = {
                    tooltip : {
                        trigger: 'axis'
                    },
                    legend: {
                        data:['".$movie_5_name."','".$movie_6_name."','".$movie_7_name."','".$movie_8_name."','".$movie_9_name."']
                    },

                    xAxis : [
                        {
                            type : 'category',
                            data : [".$six_days_ago.", ".$five_days_ago.", ".$four_days_ago.", ".$three_days_ago.", ".$two_days_ago.", ".$yesterday.", ".$today."]
                        }
                    ],
                    yAxis : [
                        {
                            type : 'value',
                            splitArea : {show : true}
                        }
                    ],
                    series : [
                        {
                            name:'".$movie_5_name."',
                            type:'line',
                            data:[".$movie_5_pv_six_days_ago.", ".$movie_5_pv_five_days_ago.", ".$movie_5_pv_four_days_ago.", ".$movie_5_pv_three_days_ago.", ".$movie_5_pv_two_days_ago.", ".$movie_5_pv_yesterday.", ".$movie_5_pv_today."]
                        },
                        {
                            name:'".$movie_6_name."',
                            type:'line',
                            data:[".$movie_6_pv_six_days_ago.", ".$movie_6_pv_five_days_ago.", ".$movie_6_pv_four_days_ago.", ".$movie_6_pv_three_days_ago.", ".$movie_6_pv_two_days_ago.", ".$movie_6_pv_yesterday.", ".$movie_6_pv_today."]
                        },
                        {
                            name:'".$movie_7_name."',
                            type:'line',
                            data:[".$movie_7_pv_six_days_ago.", ".$movie_7_pv_five_days_ago.", ".$movie_7_pv_four_days_ago.", ".$movie_7_pv_three_days_ago.", ".$movie_7_pv_two_days_ago.", ".$movie_7_pv_yesterday.", ".$movie_7_pv_today."]
                        },
                        {
                            name:'".$movie_8_name."',
                            type:'line',
                            data:[".$movie_8_pv_six_days_ago.", ".$movie_8_pv_five_days_ago.", ".$movie_8_pv_four_days_ago.", ".$movie_8_pv_three_days_ago.", ".$movie_8_pv_two_days_ago.", ".$movie_8_pv_yesterday.", ".$movie_8_pv_today."]
                        },
                        {
                            name:'".$movie_9_name."',
                            type:'line',
                            data:[".$movie_9_pv_six_days_ago.", ".$movie_9_pv_five_days_ago.", ".$movie_9_pv_four_days_ago.", ".$movie_9_pv_three_days_ago.", ".$movie_9_pv_two_days_ago.", ".$movie_9_pv_yesterday.", ".$movie_9_pv_today."]
                        }

                    ]
                };
                
                myChart.setOption(option);
            }
        );
        </script>";

    echo 
        "<script type='text/javascript'>
        require.config({
            paths:{ 
                echarts:'/application/views/global/custom/js/echarts'
            }
        });
    
        require(
            ['echarts'],
            function(ec) {
                var myChart = ec.init(document.getElementById('chart2'));
                var option = {
                    tooltip : {
                        trigger: 'axis'
                    },
                    legend: {
                        data:['".$movie_10_name."','".$movie_11_name."','".$movie_12_name."','".$movie_13_name."','".$movie_14_name."']
                    },

                    xAxis : [
                        {
                            type : 'category',
                            data : [".$six_days_ago.", ".$five_days_ago.", ".$four_days_ago.", ".$three_days_ago.", ".$two_days_ago.", ".$yesterday.", ".$today."]
                        }
                    ],
                    yAxis : [
                        {
                            type : 'value',
                            splitArea : {show : true}
                        }
                    ],
                    series : [
                        {
                            name:'".$movie_10_name."',
                            type:'line',
                            data:[".$movie_10_pv_six_days_ago.", ".$movie_10_pv_five_days_ago.", ".$movie_10_pv_four_days_ago.", ".$movie_10_pv_three_days_ago.", ".$movie_10_pv_two_days_ago.", ".$movie_10_pv_yesterday.", ".$movie_10_pv_today."]
                        },
                        {
                            name:'".$movie_11_name."',
                            type:'line',
                            data:[".$movie_11_pv_six_days_ago.", ".$movie_11_pv_five_days_ago.", ".$movie_11_pv_four_days_ago.", ".$movie_11_pv_three_days_ago.", ".$movie_11_pv_two_days_ago.", ".$movie_11_pv_yesterday.", ".$movie_11_pv_today."]
                        },
                        {
                            name:'".$movie_12_name."',
                            type:'line',
                            data:[".$movie_12_pv_six_days_ago.", ".$movie_12_pv_five_days_ago.", ".$movie_12_pv_four_days_ago.", ".$movie_12_pv_three_days_ago.", ".$movie_12_pv_two_days_ago.", ".$movie_12_pv_yesterday.", ".$movie_12_pv_today."]
                        },
                        {
                            name:'".$movie_13_name."',
                            type:'line',
                            data:[".$movie_13_pv_six_days_ago.", ".$movie_13_pv_five_days_ago.", ".$movie_13_pv_four_days_ago.", ".$movie_13_pv_three_days_ago.", ".$movie_13_pv_two_days_ago.", ".$movie_13_pv_yesterday.", ".$movie_13_pv_today."]
                        },
                        {
                            name:'".$movie_14_name."',
                            type:'line',
                            data:[".$movie_14_pv_six_days_ago.", ".$movie_14_pv_five_days_ago.", ".$movie_14_pv_four_days_ago.", ".$movie_14_pv_three_days_ago.", ".$movie_14_pv_two_days_ago.", ".$movie_14_pv_yesterday.", ".$movie_14_pv_today."]
                        }

                    ]
                };
                
                myChart.setOption(option);
            }
        );
        </script>";


    echo 
        "<script type='text/javascript'>
        require.config({
            paths:{ 
                echarts:'/application/views/global/custom/js/echarts'
            }
        });
    
        require(
            ['echarts'],
            function(ec) {
                var myChart = ec.init(document.getElementById('chart3'));
                var option = {
                    tooltip : {
                        trigger: 'axis'
                    },
                    legend: {
                        data:['".$movie_15_name."','".$movie_16_name."','".$movie_17_name."','".$movie_18_name."','".$movie_19_name."']
                    },

                    xAxis : [
                        {
                            type : 'category',
                            data : [".$six_days_ago.", ".$five_days_ago.", ".$four_days_ago.", ".$three_days_ago.", ".$two_days_ago.", ".$yesterday.", ".$today."]
                        }
                    ],
                    yAxis : [
                        {
                            type : 'value',
                            splitArea : {show : true}
                        }
                    ],
                    series : [
                        {
                            name:'".$movie_15_name."',
                            type:'line',
                            data:[".$movie_15_pv_six_days_ago.", ".$movie_15_pv_five_days_ago.", ".$movie_15_pv_four_days_ago.", ".$movie_15_pv_three_days_ago.", ".$movie_15_pv_two_days_ago.", ".$movie_15_pv_yesterday.", ".$movie_15_pv_today."]
                        },
                        {
                            name:'".$movie_16_name."',
                            type:'line',
                            data:[".$movie_16_pv_six_days_ago.", ".$movie_16_pv_five_days_ago.", ".$movie_16_pv_four_days_ago.", ".$movie_16_pv_three_days_ago.", ".$movie_6_pv_two_days_ago.", ".$movie_16_pv_yesterday.", ".$movie_16_pv_today."]
                        },
                        {
                            name:'".$movie_17_name."',
                            type:'line',
                            data:[".$movie_17_pv_six_days_ago.", ".$movie_17_pv_five_days_ago.", ".$movie_17_pv_four_days_ago.", ".$movie_17_pv_three_days_ago.", ".$movie_17_pv_two_days_ago.", ".$movie_17_pv_yesterday.", ".$movie_17_pv_today."]
                        },
                        {
                            name:'".$movie_18_name."',
                            type:'line',
                            data:[".$movie_18_pv_six_days_ago.", ".$movie_18_pv_five_days_ago.", ".$movie_18_pv_four_days_ago.", ".$movie_18_pv_three_days_ago.", ".$movie_18_pv_two_days_ago.", ".$movie_18_pv_yesterday.", ".$movie_18_pv_today."]
                        },
                        {
                            name:'".$movie_19_name."',
                            type:'line',
                            data:[".$movie_19_pv_six_days_ago.", ".$movie_19_pv_five_days_ago.", ".$movie_19_pv_four_days_ago.", ".$movie_19_pv_three_days_ago.", ".$movie_19_pv_two_days_ago.", ".$movie_19_pv_yesterday.", ".$movie_19_pv_today."]
                        }

                    ]
                };
                
                myChart.setOption(option);
            }
        );
        </script>";

    echo 
        "<script type='text/javascript'>
        require.config({
            paths:{ 
                echarts:'/application/views/global/custom/js/echarts'
            }
        });
    
        require(
            ['echarts'],
            function(ec) {
                var myChart = ec.init(document.getElementById('chart4'));
                var option = {
                    tooltip : {
                        trigger: 'axis'
                    },
                    legend: {
                        data:['".$movie_20_name."','".$movie_21_name."','".$movie_22_name."','".$movie_23_name."','".$movie_24_name."']
                    },

                    xAxis : [
                        {
                            type : 'category',
                            data : [".$six_days_ago.", ".$five_days_ago.", ".$four_days_ago.", ".$three_days_ago.", ".$two_days_ago.", ".$yesterday.", ".$today."]
                        }
                    ],
                    yAxis : [
                        {
                            type : 'value',
                            splitArea : {show : true}
                        }
                    ],
                    series : [
                        {
                            name:'".$movie_20_name."',
                            type:'line',
                            data:[".$movie_20_pv_six_days_ago.", ".$movie_20_pv_five_days_ago.", ".$movie_20_pv_four_days_ago.", ".$movie_20_pv_three_days_ago.", ".$movie_20_pv_two_days_ago.", ".$movie_20_pv_yesterday.", ".$movie_20_pv_today."]
                        },
                        {
                            name:'".$movie_21_name."',
                            type:'line',
                            data:[".$movie_21_pv_six_days_ago.", ".$movie_21_pv_five_days_ago.", ".$movie_21_pv_four_days_ago.", ".$movie_21_pv_three_days_ago.", ".$movie_21_pv_two_days_ago.", ".$movie_21_pv_yesterday.", ".$movie_21_pv_today."]
                        },
                        {
                            name:'".$movie_22_name."',
                            type:'line',
                            data:[".$movie_22_pv_six_days_ago.", ".$movie_22_pv_five_days_ago.", ".$movie_22_pv_four_days_ago.", ".$movie_22_pv_three_days_ago.", ".$movie_22_pv_two_days_ago.", ".$movie_22_pv_yesterday.", ".$movie_22_pv_today."]
                        },
                        {
                            name:'".$movie_23_name."',
                            type:'line',
                            data:[".$movie_23_pv_six_days_ago.", ".$movie_23_pv_five_days_ago.", ".$movie_23_pv_four_days_ago.", ".$movie_23_pv_three_days_ago.", ".$movie_23_pv_two_days_ago.", ".$movie_23_pv_yesterday.", ".$movie_23_pv_today."]
                        },
                        {
                            name:'".$movie_24_name."',
                            type:'line',
                            data:[".$movie_24_pv_six_days_ago.", ".$movie_24_pv_five_days_ago.", ".$movie_24_pv_four_days_ago.", ".$movie_24_pv_three_days_ago.", ".$movie_24_pv_two_days_ago.", ".$movie_24_pv_yesterday.", ".$movie_24_pv_today."]
                        }

                    ]
                };
                
                myChart.setOption(option);
            }
        );
        </script>";


    echo 
        "<script type='text/javascript'>
        require.config({
            paths:{ 
                echarts:'/application/views/global/custom/js/echarts'
            }
        });
    
        require(
            ['echarts'],
            function(ec) {
                var myChart = ec.init(document.getElementById('chart5'));
                var option = {
                    tooltip : {
                        trigger: 'axis'
                    },
                    legend: {
                        data:['".$movie_25_name."','".$movie_26_name."','".$movie_27_name."','".$movie_28_name."','".$movie_29_name."']
                    },

                    xAxis : [
                        {
                            type : 'category',
                            data : [".$six_days_ago.", ".$five_days_ago.", ".$four_days_ago.", ".$three_days_ago.", ".$two_days_ago.", ".$yesterday.", ".$today."]
                        }
                    ],
                    yAxis : [
                        {
                            type : 'value',
                            splitArea : {show : true}
                        }
                    ],
                    series : [
                        {
                            name:'".$movie_25_name."',
                            type:'line',
                            data:[".$movie_25_pv_six_days_ago.", ".$movie_25_pv_five_days_ago.", ".$movie_25_pv_four_days_ago.", ".$movie_25_pv_three_days_ago.", ".$movie_25_pv_two_days_ago.", ".$movie_25_pv_yesterday.", ".$movie_25_pv_today."]
                        },
                        {
                            name:'".$movie_26_name."',
                            type:'line',
                            data:[".$movie_26_pv_six_days_ago.", ".$movie_26_pv_five_days_ago.", ".$movie_26_pv_four_days_ago.", ".$movie_26_pv_three_days_ago.", ".$movie_26_pv_two_days_ago.", ".$movie_26_pv_yesterday.", ".$movie_26_pv_today."]
                        },
                        {
                            name:'".$movie_27_name."',
                            type:'line',
                            data:[".$movie_27_pv_six_days_ago.", ".$movie_27_pv_five_days_ago.", ".$movie_27_pv_four_days_ago.", ".$movie_27_pv_three_days_ago.", ".$movie_27_pv_two_days_ago.", ".$movie_27_pv_yesterday.", ".$movie_27_pv_today."]
                        },
                        {
                            name:'".$movie_28_name."',
                            type:'line',
                            data:[".$movie_28_pv_six_days_ago.", ".$movie_28_pv_five_days_ago.", ".$movie_28_pv_four_days_ago.", ".$movie_28_pv_three_days_ago.", ".$movie_28_pv_two_days_ago.", ".$movie_28_pv_yesterday.", ".$movie_28_pv_today."]
                        },
                        {
                            name:'".$movie_29_name."',
                            type:'line',
                            data:[".$movie_29_pv_six_days_ago.", ".$movie_29_pv_five_days_ago.", ".$movie_29_pv_four_days_ago.", ".$movie_29_pv_three_days_ago.", ".$movie_29_pv_two_days_ago.", ".$movie_29_pv_yesterday.", ".$movie_29_pv_today."]
                        }

                    ]
                };
                
                myChart.setOption(option);
            }
        );
        </script>";

?>

<div style="width:750px;float:left;margin-top:10px;">
    <div style="width:180px;float:right;margin-top:10px;">
       <span>每页显示：</span>
       <?php echo "<a href='/movie/index/per_page/20'>20</a>"; ?>
       <?php echo "<a href='/movie/index/per_page/50'>50</a>"; ?>
       <?php echo "<a href='/movie/index/per_page/100'>100</a>"; ?>  
    </div>
    <div style="width:570px;float:right;margin-top:10px;">
        <?php echo $page;?>&nbsp;&nbsp;跳到<input type='text' id='to_page' style='width:30px;height:20px'>页
        <input type="hidden" id="jump_url" value="<?php echo base_url($controller.'/'.$method);?>">
        <input type="hidden" id="final_pagesize" value="<?php echo $this->session->userdata('movie_final_pagesize');?>">
        <input type="button" value="确定" class='btn btn-default btn-xs' onclick=jump()>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="<?php echo base_url('/movie/to_excel'); ?>">导出报表</a>
    </div> 
</div>

<div style="width:1100px;float:left;margin-top:10px">
    <table style="width:1100px">

        <tr style="background:#337ab7;color:white;">
            <td width="20%">device_mac</td>
            <td width="20%">sn</td>
            <td width="20%">time</td>
            <td width="20%">movie_name</td>
            <td width="20%">movie_play_times</td>
        </tr>
        <?php foreach($deviceinfo as $row):?>
            <tr> 
                <td width="20%"><?php echo $row['device_mac'];?></td>
                <td width="20%"><?php echo $row['sn'];?></td>
                <td width="20%"><?php echo $row['time'];?></td>
                <td width="20%"><?php echo ${"movie_".$row['movie_name']."_name"};?></td>
                <td width="20%"><?php echo $row['movie_play_times'];?></td>         
            </tr>
        <?php endforeach?>
    </table>
</div>
<div style="width:750px;float:left;margin-top:10px;">
    <div style="width:180px;float:right;margin-top:10px;">
       <span>每页显示：</span>
       <?php echo "<a href='/movie/index/per_page/20'>20</a>"; ?>
       <?php echo "<a href='/movie/index/per_page/50'>50</a>"; ?>
       <?php echo "<a href='/movie/index/per_page/100'>100</a>"; ?>  
    </div>
    <div style="width:570px;float:right;margin-top:10px;">
        <?php echo $page;?>&nbsp;&nbsp;跳到<input type='text' id='to_page' style='width:30px;height:20px'>页
        <input type="hidden" id="jump_url" value="<?php echo base_url($controller.'/'.$method);?>">
        <input type="hidden" id="final_pagesize" value="<?php echo $this->session->userdata('movie_final_pagesize');?>">
        <input type="button" value="确定" class='btn btn-default btn-xs' onclick=jump()>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="<?php echo base_url('/movie/to_excel'); ?>">导出报表</a>
    </div> 
</div>
<script language="LiveScript"> 
function jump(){
    var offset = (document.getElementById("to_page").value - 1)*document.getElementById('final_pagesize').value;
    if(offset < 0){
        offset = 0;
    }
    var url =document.getElementById("jump_url").value+'/'+ offset;        
    window.open(url, '_self');    
} 
</script>
