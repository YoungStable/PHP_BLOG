<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class SinglePageModel extends Model{
    public function getSinglePage(){
        $sql = 'select * from bg_singlePage order by page_id desc';
        return $this->dao->fetchAll($sql);
    }
    
    public function insertPage($pageInfo){
        extract($pageInfo);
        $sql = "insert into bg_singlePage values (null,'$title','$content')";
        return $this->dao->my_query($sql);
    }
}
