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
}
