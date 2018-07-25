<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class PlatformController extends Controller{
    protected function checkLogin(){
        $noChk = array(
            'admin' => array('login','validate','captcha')
        );
        if(isset($noChk[strtolower(CONTROLLER)])&&in_array(ACTION, $noChk[strtolower(CONTROLLER)]))
            return;
        @session_start();
        if(!isset($_SESSION['admininfo'])){
            $this->jump('index.php?p=Admin&c=Admin&a=login', '请您先登录');
        }
    }
    
    public function __construct() {
        parent::__construct();
        $this->checkLogin();
    }
}
