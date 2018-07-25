<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Controller{
    protected $smarty;

    protected function initCode(){
        header('content-type:text/html;charset:utf-8');
    }
    
    protected function initSmarty(){
        $this->smarty = new Smarty;
        $this->smarty->setTemplateDir(CURRENT_VIEW_DIR.CONTROLLER.'/');
        $this->smarty->setCompileDir(APP_DIR.PLATFORM.'/view_c/'.CONTROLLER.'/');
    }
    
    public function assign($name,$value){
        $this->smarty->assign($name,$value);
    }
    
    public function display($tpl){
        $this->smarty->display($tpl);
    }

    public function __construct() {
        $this->initCode();
        $this->initSmarty();
    }
    
    protected function escapeData($data){
        return addslashes(strip_tags(trim($data)));
    }
    
    protected function jump($url, $msg=NULL, $time=3){
        if(!$msg){
            header('location:'.$url);
            die;
        }
        else{
            echo <<<JUMP_HTML
               <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>提示信息</title>
    <style type='text/css'>
        * {margin:0; padding:0;}
        div {width:390px; height:287px; border:1px #09C solid; position:absolute; left:50%; margin-left:-195px; top:10%;}
        div h2 {width:100%; height:30px; line-height:30px; background-color:#09C; font-size:14px; color:#FFF; text-indent:10px;}
        div p {height:120px; line-height:120px; text-align:center;}
        div p strong {font-size:26px;}
    </style>
	<div>
        <h2>提示信息</h2>
        <p>
            <strong>$msg</strong><br />
			页面在<span id="second">$time</span>秒后会自动跳转，或点击<a id="tiao" href="$url">立即跳转</a>
        </p>
    </div>
    <script type="text/javascript">
        var url = document.getElementById('tiao').href;
        function daoshu(){
            var scd = document.getElementById('second');
            var time = --scd.innerHTML;
            if(time<=0){
                window.location.href = url;
                clearInterval(mytime);
            }
        }
        var mytime = setInterval("daoshu()",1000);
    </script>
JUMP_HTML;
            die;
        }
    }
}