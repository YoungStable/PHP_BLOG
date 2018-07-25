<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class CategoryModel extends Model{
    public function getCategory(){
        $sql = 'select * from bg_category order by cate_sort asc';
        $list = $this->dao->fetchAll($sql);
       return $this->getCategoryTree($list);
    }
    
    private function getCategoryTree($list,$pid=0, $depth=0){
        static $cate_list = array();
        foreach ($list as $row){
            if($row['cate_pid']==$pid){
                $row['depth'] = $depth;
                $cate_list[] = $row;
                $this->getCategoryTree($list, $row['cate_id'], $depth+1);
            }
        }
        return $cate_list;
    }
    
    public function insertCateData($cate){
        extract($cate);
        $sql = "insert into bg_category values(null, '$cate_name','$cate_pid','$cate_sort','$cate_desc')";
        return $this->dao->my_query($sql);
    }
    
    public function getCategoryInfoById($cate_id){
        $sql = "select * from bg_category where cate_id=$cate_id";
        return $this->dao->fetchRow($sql);
    }
    
    public function updateCateData($cate){
        extract($cate);
        $sql = "update bg_category set cate_name='$cate_name', cate_desc='$cate_desc', cate_sort=$cate_sort, cate_pid=$cate_pid where cate_id=$cate_id";
        return $this->dao->my_query($sql);
    }
    
    public function delCategory($cate_id){
        $sql = "delete from bg_category where cate_id=$cate_id";
        return $this->dao->my_query($sql);
    }
    
    public function delMultiCategory($cate_id){
        $cate_id_str = implode(',', $cate_id);
        $sql = "delete from bg_category where cate_id in ($cate_id_str)";
        return $this->dao->my_query($sql);
    }
}