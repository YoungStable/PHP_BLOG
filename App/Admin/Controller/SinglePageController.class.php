<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class SinglePageController extends PlatformController{
    public function indexAction(){
        $singlePage = Factory::getModelInstance('SinglePageModel');
        $pageInfo = $singlePage->getSinglePage();
        $this->assign('pageInfo', $pageInfo);
        $this->display('index.html');
    }
    
    public function addAction(){
        $this->display('add.html');
    }
    
    public function addDealAction(){
        $pageInfo = array();
        $pageInfo['title'] = $this->escapeData($_POST['title']);
        $pageInfo['content'] = addslashes($_POST['content']);
        if(empty($pageInfo['title'])||empty($pageInfo['content']))
            $this->jump ('index.php?p=Admin&c=SinglePage&a=add', '您填写的信息不完整');
        $singlePage = Factory::getModelInstance('SinglePageModel');
        $result = $singlePage->insertPage($pageInfo);
        if($result)
            $this->jump ('index.php?p=Admin&c=SinglePage&a=index');
        else
            $this->jump ('index.php?p=Admin&c=SinglePage&a=add', '发生未知错误，数据入库失败');
    }
}
