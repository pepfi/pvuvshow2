
<script src="/application/views/global/custom/js/esl.js"></script>
<div style="width:100%;">总Pv：<?php echo $totalpv;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;总Uv：<?php echo $totaluv;?></div>
<div id="chart0" style="width:370px;height:250px;border:1px solid #ccc;float:left"></div>
<div id="chart1" style="width:370px;height:250px;border:1px solid #ccc;float:left;margin-left:60px"></div>
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
                        data:['Pv']
                    },
                    calculable : true,
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
                            name:'Pv',
                            type:'line',
                            data:[".$pv['six_days_ago'].", ".$pv['five_days_ago'].", ".$pv['four_days_ago'].", ".$pv['three_days_ago'].", ".$pv['two_days_ago'].", ".$pv['yesterday'].", ".$pv['today']."]
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
                        data:['Uv']
                    },
                    calculable : true,
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
                            name:'Uv',
                            type:'line',
                            data:[".$uv['six_days_ago'].", ".$uv['five_days_ago'].", ".$uv['four_days_ago'].", ".$uv['three_days_ago'].", ".$uv['two_days_ago'].", ".$uv['yesterday'].", ".$uv['today']."]
                        }
                    ]
                };
                
                myChart.setOption(option);
            }
        );
        </script>";
?>
<div style="width:800px;float:left;margin-top:10px">
    <table>

        <tr style="background:#337ab7;color:white;">
            <td width="20%">device_mac</td>
            <td width="15%">time</td>
            <td width="10%">pv</td>
            <td width="10%">download</td>
            <td width="10%">uv</td>
            <td width="10%">uv_andriod</td>
            <td width="10%">uv_ios</td>
            <td width="15%">uv_windows</td>
            <td width="10%">uv_others</td>
        </tr>
        <?php foreach($deviceinfo as $row):?>
            <tr> 
                <td width="20%"><?php echo $row['device_mac'];?></td>
                <td width="15%"><?php echo $row['time'];?></td>
                <td width="10%"><?php echo $row['pv'];?></td>
                <td width="10%"><?php echo $row['download_app_times'];?></td>
                <td width="10%"><?php echo $row['uv'];?></td>
                <td width="10%"><?php echo $row['uv_android'];?></td>
                <td width="10%"><?php echo $row['uv_ios'];?></td>
                <td width="15%"><?php echo $row['uv_windows'];?></td>
                <td width="10%"><?php echo $row['uv_others'];?></td>             
            </tr>
        <?php endforeach?>
        
    </table>
</div>
<div style="width:800px;float:left;margin-top:10px;">
    <div style="width:180px;float:right;margin-top:10px;">
       <span>每页显示：</span>
       <?php echo "<a href='/pvuv/index/per_page/20'>20</a>"; ?>
       <?php echo "<a href='/pvuv/index/per_page/50'>50</a>"; ?>
       <?php echo "<a href='/pvuv/index/per_page/100'>100</a>"; ?> 
    </div>
    <div style="width:570px;float:right;margin-top:10px;">
        <?php echo $page;?>&nbsp;&nbsp;跳到<input type='text' id='to_page' style='width:30px;height:20px'>页
        <input type="hidden" id="jump_url" value="<?php echo base_url($controller.'/'.$method);?>">
        <input type="hidden" id="final_pagesize" value="<?php echo $this->session->userdata('pvuv_final_pagesize');?>">
        <input type="button" value="确定" class='btn btn-default btn-xs' onclick=jump()>
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