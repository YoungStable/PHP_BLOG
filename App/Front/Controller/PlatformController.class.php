<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class PlatformController extends Controller{
    public function __construct() {
        parent::__construct();
        $this->initTopCateInfo();
        $this->initVars();
        $this->initSession();
    }
    
    public function initTopCateInfo(){
        $category = Factory::getModelInstance('CategoryModel');
        $topCate = $category->getTopCate();
        $this->assign('topCate', $topCate);
    }
    
    public function initVars(){
        $title = '年轻人要稳个人博客示例';
        $keywords = 'PHP、个人博客、年轻人要稳个人博客';
        $description = '基于MVC的PHP为基础的博客系统，前台现成模版，后台手写';
        $this->assign('title', $title);
        $this->assign('keywords', $keywords);
        $this->assign('description', $description);
    }
    
    public function initSession(){
        @session_start();
    }
}
