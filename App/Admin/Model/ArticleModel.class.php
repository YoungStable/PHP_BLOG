<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ArticleModel extends Model{
    public function insertArtData($art){
        extract($art);
        $addtime = time();
        $sql = "insert into bg_article values (null,$cate_id,'$title','$thumb','$art_desc','$content','$author',default,default,$addtime,default,default);";
        return $this->dao->my_query($sql);
    }
    
    public function getArticle(){
        $pageNo = isset($_GET['pageNo'])?$_GET['pageNo']:1;
        $pageSize = $GLOBALS['conf']['Page']['pageSize'];
        $offset = ($pageNo-1)*$pageSize;
        $sql = "select a.*, c.cate_name from bg_article as a left join bg_category as c on a.cate_id=c.cate_id where is_del='0' order by addtime desc limit $offset, $pageSize";
        return $this->dao->fetchAll($sql);
    }
    
    public function getArticleByID($art_id){
        $sql = "select * from bg_article where art_id='$art_id'";
        return $this->dao->fetchRow($sql);
    }
    
    public function updateArtData($art){
        extract($art);
        $sql = "update bg_article set cate_id=$cate_id, title='$title', thumb='$thumb', art_desc='$art_desc',content='$content', author='$author' where art_id=$art_id";
        return $this->dao->my_query($sql);
    }
    
    public function delArticle($art_id){
        $sql = "update bg_article set is_del='1' where art_id=$art_id";
        return $this->dao->my_query($sql);
    }
    
    public function delMultiArticle($art_id){
        $art_id_str = implode(',', $art_id);
        $sql = "update bg_article set is_del='1' where art_id in ($art_id_str)";
        return $this->dao->my_query($sql);
    }
    
    public function getDeletedArt(){
        $sql = "select a.*, c.cate_name from bg_article as a left join bg_category as c on a.cate_id=c.cate_id where is_del='1' order by addtime desc";
        return $this->dao->fetchAll($sql);
    }
    
    public function recoverArticle($art_id){
        $sql = "update bg_article set is_del='0' where art_id=$art_id";
        return $this->dao->my_query($sql);
    }
    
    public function realDelArticle($art_id){
        $sql = "delete from bg_article where art_id=$art_id";
        return $this->dao->my_query($sql);
    }
    
    public function realDelMultiArticle($art_id){
        $art_id_str = implode(',', $art_id);
        $sql = "delete from bg_article  where art_id in ($art_id_str)";
        return $this->dao->my_query($sql);
    }
    
    public function getSum(){
        $sql = "select count(*) from bg_article where is_del='0'";
        return $this->dao->fetchColumn($sql);
    }
    
    public function updateRecommend($art_id,$is_recommend){
        if($is_recommend == '0'){
            $is_recommend = '1';
        }else{
            $is_recommend = '0';
        }
        $sql = "update bg_article set is_recommend='$is_recommend' where art_id=$art_id";
        return $this->dao->my_query($sql);
    }
}