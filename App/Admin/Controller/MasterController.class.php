<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class MasterController extends PlatformController{
    public function indexAction(){
        $master = Factory::getModelInstance('MasterModel');
        $masterInfo = $master->getMasterInfo();
        $this->assign('masterInfo', $masterInfo);
        $this->display('index.html');
    }
    
    public function editAction(){
        $masterInfo = array();
        $masterInfo['nickname'] = $_POST['nickname'];
        $masterInfo['job'] = $_POST['job'];
        $masterInfo['home'] = $_POST['home'];
        $masterInfo['tel'] = $_POST['tel'];
        $masterInfo['email'] = $_POST['email'];
        
        if(empty($masterInfo['nickname'])||empty($masterInfo['job'])
                ||empty($masterInfo['home'])||empty($masterInfo['tel'])||empty($masterInfo['email'])){
            $this->jump('index.php?p=Admin&c=Master&a=index','请将信息填写完整!');
        }
        
        $master = Factory::getModelInstance('MasterModel');
        $result = $master->updateMasterInfo($masterInfo);
        if($result)
            $this->jump('index.php?p=Admin&c=Master&a=index','更改成功');
        else
            $this->jump('index.php?p=Admin&c=Master&a=index','发生未知错误，更改失败');
    }
}
