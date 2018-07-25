<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class AdminController extends PlatformController{
    public function loginAction(){
        $this->display('login.html');
    }
    
    public function validateAction(){
        $admin_name = $this->escapeData($_POST['admin_name']);
        $admin_pass = $_POST['admin_pass'];         //数据库中已被MD5转换，故无需处理
        $captcha_code = trim($_POST['captcha_code']);
        
       
//        if(!Captcha::checkCaptcha($captcha_code)){
//            $this->jump('index.php?p=Admin&c=Admin&login', '验证码输入错误！');
//        }
        $admin = Factory::getModelInstance('AdminModel');  //调用工厂方法
         
        if($row = $admin->validate($admin_name,$admin_pass)){
            @session_start();
            $_SESSION['admininfo'] = $row;
            $admin->updateAdminInfo($row['admin_id']);
            var_dump($_SESSION['admininfo']);
            $this->jump('index.php?p=Admin&c=Manage&a=index');
        }
        else{
            $this->jump('index.php?p=Admin&c=Admin&a=login','用户名或密码不正确！');
        }
    }
    
    public function captchaAction(){
        $captcha = Factory::getModelInstance('Captcha');
        $captcha->generate();
    }
    
    public function logoutAction(){
        @session_start();
        unset($_SESSION['admininfo']);
        session_destroy();
        $this->jump("index.php?p=Admin&c=Admin&a=login");
    }

}
