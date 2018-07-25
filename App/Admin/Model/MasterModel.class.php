<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class MasterModel extends Model{
    public function getMasterInfo(){
        $sql = 'select * from bg_master limit 1';
        return $this->dao->fetchRow($sql);
    }
    
    public function updateMasterInfo($masterInfo){
        extract($masterInfo);
        $sql = "update bg_master set nickname='$nickname',job='$job',tel='$tel',home='$home',email='$email'";
        return $this->dao->my_query($sql);
    }
}
