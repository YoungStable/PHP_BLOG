<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class SinglePageController extends PlatformController{
    public function indexAction(){
        $page_id = $_GET['page_id'];
        $singlePage = Factory::getModelInstance('SinglePageModel');
        $pageInfo = $singlePage->getPageInfoByID($page_id);
        $this->assign('pageInfo', $pageInfo);
        $master = Factory::getModelInstance('MasterModel');
        $masterInfo = $master->getMasterInfo();
        $this->assign('masterInfo', $masterInfo);
        
        $this->display('index.html');
        
    }
}
