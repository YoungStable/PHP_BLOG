<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class SinglePageModel extends Model{
    public function getPageInfoByID($page_id){
        $sql = "select * from bg_singlePage where page_id =$page_id";
        return $this->dao->fetchRow($sql);
    }
}
