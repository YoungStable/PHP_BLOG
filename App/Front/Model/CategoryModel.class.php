<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class CategoryModel extends Model{
    public function getTopCate(){
        $sql = 'select * from bg_category where cate_pid=0 order by cate_sort limit 5';
        return $this->dao->fetchAll($sql);
    }
    
    public function getSubCate($cate_id){
        $sql = "select cate_id,cate_name from bg_category where cate_pid=$cate_id";
        return $this->dao->fetchAll($sql);
    }
 
}
