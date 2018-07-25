<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class ArticleModel extends Model{
    public function getRecommendArt($num){
        $sql = "select a.* ,c.cate_name from bg_article as a left join bg_category as c on a.cate_id = c.cate_id where is_recommend='1' and is_del='0'"
                . "order by addtime desc limit $num";
        return $this->dao->fetchAll($sql);
    }
    
    public function getRmdArtByHits($num){
        $sql = "select art_id, title from bg_article where is_recommend='1' and is_del='0' order by hits desc limit $num";
        return $this->dao->fetchAll($sql);
    }
    
    public function getLatestArt($num){
        $sql = "select art_id, title from bg_article where is_del='0' order by addtime desc limit $num";
        return $this->dao->fetchAll($sql);
    }
    
    public function getArtInfo($cate_id){
        $subIDs = $this->getSubIDs($cate_id);
        $subIDs .= $cate_id;
        $pageNo = isset($_GET['pageNo'])?$_GET['pageNo']:1;
        $offset = ($pageNo-1)*9;
        $sql = "select a.*, c.cate_name from bg_article as a left join bg_category as c on a.cate_id=c.cate_id where a.cate_id in ($subIDs) and is_del='0' limit $offset,9";
        return $this->dao->fetchAll($sql);
    }
    
    public function getSubIDs($cate_id){
        $sql = "select cate_id from bg_category where cate_pid=$cate_id";
        $result = $this->dao->fetchAll($sql);
        static $subIDs = '';
        foreach($result as $row){
            $subIDs .= $row['cate_id'].',';
            $this->getSubIDs($row['cate_id']);
        }
        return $subIDs;
    }
    
    public function getSumByID($cate_id){
        $subIDs = $this->getSubIDs($cate_id);
        //最后加上本类的ID，准备进行查询
        $subIDs .= $cate_id;
        $sql = "select count(*) from bg_article where is_del='0' and cate_id in ($subIDs)";
        return $this->dao->fetchColumn($sql);
    }
    
    public function getAllCate($cate_id){
        $sql = "select cate_pid,cate_name from bg_category where cate_id=$cate_id";
        $cateInfo = $this->dao->fetchRow($sql);
        $cate_name = $cateInfo['cate_name'];
        static $list = array();
        $list[$cate_id] = $cate_name;
        $cate_pid = $cateInfo['cate_pid'];
        if($cate_pid != 0)
            $this->getAllCate($cate_pid);
        
        return array_reverse($list, true);
    }
    public function getSortByHits($cate_id,$num){
        $subIDs = $this->getSubIDs($cate_id);
        //最后加上本类的ID，准备进行查询
        $subIDs .= $cate_id;            
        $sql = "select art_id,title from bg_article where is_del='0' and cate_id in ($subIDs) order by hits desc limit $num";
        return $this->dao->fetchAll($sql);
    }
    
    public function getSortByRecommend($cate_id,$num){
        $subIDs = $this->getSubIDs($cate_id);
        //最后加上本类的ID，准备进行查询
        $subIDs .= $cate_id;            
        $sql = "select art_id,title from bg_article where is_del='0' and is_recommend='1' and cate_id in ($subIDs) order by addtime desc limit $num";
        return $this->dao->fetchAll($sql);
    }
    
    public function getArtInfoByID($art_id){
        $sql = "select * from bg_article where art_id=$art_id";
        return $this->dao->fetchRow($sql);
    }
    
    
    public function updateHits($art_id){
        $sql = "update bg_article set hits=hits+1 where art_id=$art_id";
        return $this->dao->my_query($sql);
    }
    
    public function getPrevArt($cate_id,$art_id){
        $son_IDs = $this->getSubIDs($cate_id);
        $result = $this->getAllCate($cate_id);
        $father_IDs = implode(',', array_keys($result));
        $IDs = $son_IDs.$father_IDs;
        $sql = "select art_id,title from bg_article where is_del='0' and cate_id in ($IDs) and art_id<$art_id order by art_id desc limit 1";
        return $this->dao->fetchRow($sql);
    }
    
    public function getNextArt($cate_id,$art_id){
        $son_IDs = $this->getSubIDs($cate_id);
        $result = $this->getAllCate($cate_id);
        $father_IDs = implode(',', array_keys($result));
        $IDs = $son_IDs.$father_IDs;
        $sql = "select art_id,title from bg_article where is_del='0' and cate_id in ($IDs) and art_id>$art_id order by art_id limit 1";
        return $this->dao->fetchRow($sql);
    }
    
    public function updateReplyNums($art_id){
        $sql = "update bg_article set reply_nums=reply_nums+1 where art_id = $art_id";
        return $this->dao->my_query($sql);
    }
}
