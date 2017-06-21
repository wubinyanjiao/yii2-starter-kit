<?php
use yii\helpers\Html; 
//var_dump(empty(null));exit;
//var_dump($data['other']);exit;
?>
    <div class="main">
        <div class="main-1">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-md-3 col-sm-3 col-xs-3">
                        <div class="row-box">
                            <!-- <div class="main-1-icon-1"><a href="#"><div class="aaa"></div></a></div> -->
                            <!-- <a href="#"><div class="main-1-icon-1"></div></a> -->
                            <?php 
                                $href= yii\helpers\Url::to(['page/view','slug'=>'xiao-xue-bu-zhao-sheng-jian-zhang']);
                                $html='';
                                $html.='<a href="'.$href.'">';
                                $html.='<div class="main-1-icon-1"></div>';
                                $html.='</a>';
                                echo $html;
                            ?>
                            <img src="http://7xsm8j.com2.z0.glb.qiniucdn.com/main-1-line.png">
                            <h4><?php echo Html::a('小学部',['page/view','slug'=>'xiao-xue-bu-zhao-sheng-jian-zhang'],['class'=>'headcolor','data-method'=>'open',]);?>
                            <h6>Primary School Department</h6></h4>
                        </div>
                    </div>
                    <div class="col-md-3 col-md-3 col-sm-3 col-xs-3">
                        <div class="row-box">
                            <!-- <a href="#"><div class="main-1-icon-2"></div></a> -->
                            <?php 
                                $href= yii\helpers\Url::to(['page/view','slug'=>'chu-zhong-bu-zhao-sheng-jian-zhang']);
                                $html='';
                                $html.='<a href="'.$href.'">';
                                $html.='<div class="main-1-icon-1"></div>';
                                $html.='</a>';
                                echo $html;
                            ?>
                            <img src="http://7xsm8j.com2.z0.glb.qiniucdn.com/main-1-line.png">
                        
                            <h4><?php echo Html::a('中学部',['page/view','slug'=>'gao-zhong-bu-zhao-sheng-jian-zhang'],['class'=>'headcolor','data-method'=>'open',]);?>
                            <h6>Daltonian</h6>
                        </div>
                    </div>
                    <div class="col-md-3 col-md-3 col-sm-3 col-xs-3">
                        <div class="row-box">
                            <!-- <a href="#"><div class="main-1-icon-3"></div></a> -->
                            <?php 
                                $href= yii\helpers\Url::to(['page/view','slug'=>'guo-ji-zhong-xue-bu-zhao-sheng-jian-zhang']);
                                $html='';
                                $html.='<a href="'.$href.'">';
                                $html.='<div class="main-1-icon-1"></div>';
                                $html.='</a>';
                                echo $html;
                            ?>
                            <img src="http://7xsm8j.com2.z0.glb.qiniucdn.com/main-1-line.png">
                            
                            <h4><?php echo Html::a('国际部',['page/view','slug'=>'guo-ji-zhong-xue-bu-zhao-sheng-jian-zhang'],['class'=>'headcolor','data-method'=>'open',]);?>
                            <h6>Oversea sales</h6>
                        </div>
                    </div>
                    <div class="col-md-3 col-md-3 col-sm-3 col-xs-3">
                        <div class="row-box">
                            <!-- <a href="#"><div class="main-1-icon-4"></div></a> -->
                            <?php 
                                $href= yii\helpers\Url::to(['page/view','slug'=>'te-zhang-bu-zhao-sheng-jian-zhang']);
                                $html='';
                                $html.='<a href="'.$href.'">';
                                $html.='<div class="main-1-icon-1"></div>';
                                $html.='</a>';
                                echo $html;
                            ?>
                            <img src="http://7xsm8j.com2.z0.glb.qiniucdn.com/main-1-line.png">
                            
                            <h4><?php echo Html::a('特长部',['page/view','slug'=>'te-zhang-bu-zhao-sheng-jian-zhang'],['class'=>'headcolor','data-method'=>'open',]);?>
                            <h6>Specialty department</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--教师风采页面-->
        <div class="main-2">
            <?php echo $this->render('@frontend/themes/gedu/site/common/teacher.php',['data'=>$data]);?>
        </div>
        <div class="main-3">
            <div class="main-3-head">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 main-2-top">
                        <h1>CAMPUS FEATURES</h1>
                        <h4>校园风采</h4>
                        <img src="http://7xsm8j.com2.z0.glb.qiniucdn.com/main-line.png" width="100%">
                    </div>
                </div>
            </div>
            <!--校园风采模块 -->
            <?php 
                if(!is_mobile()){
                    echo $this->render('@frontend/themes/gedu/site/common/elegant.php');
                }else{
                    echo $this->render('@frontend/themes/gedu/site/common/mobile_elegant');
                } 
            ?>    
        </div>

        <!--新闻模块，视频播放模块 -->
        <div class="main-4">
            <?php echo $this->render('@frontend/themes/gedu/site/common/article.php',['data'=>$data]);?>
        </div>
    </div>

    <script type="text/javascript">
      $(function(){
        var oV=document.getElementById('yjzxVideo');
        var oVbtn=$('.videoBtn');
        var oVbox=$('.videoBox');
        var oVbg=$('.videoBg');
        var nav=$('.navbar');
        var navWord=$('.navbar-nav li a');
        var logo1=$('.logo1 img');
        var logo2=$('.logo2 img');
        var donebg_p=$('.done_bg p');
        var donebg=$('.done_bg');

     
     if(!(navigator.userAgent.indexOf("Safari") > -1 && navigator.userAgent.indexOf("Chrome") == -1)){
        oVbox.on('click',function(){
          oV.play();
          oVbg.css({'display':'none','background':'none'});
        });
      }
        /*oV.play();*/
        if(navigator.userAgent.indexOf('Firefox') >= 0){
            donebg.addClass('fire_bg');
            donebg_p.css({'display':'-moz-box','padding-bottom':'170px'});
        }
        if(navigator.userAgent.indexOf("Safari") > -1 && navigator.userAgent.indexOf("Chrome") == -1){
            oVbox.css({'height':'0'});
            oVbtn.on('click',function(){
                  
                  oVbtn.css({'display':'none','background':'none'});
                });
        }
      })
</script>