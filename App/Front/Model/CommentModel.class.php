<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class CommentModel extends Model{
    public function insertComment($cmtInfo){
        extract($cmtInfo);
        $sql = "insert into bg_comment values (null, $art_id,'$cmt_user','$cmt_content','$cmt_time')";
        return $this->dao->my_query($sql);
    }
    
    public function getRowCountByArtID($art_id){
        $sql = "select count(*) from bg_comment where art_id = $art_id";
        return $this->dao->fetchColumn($sql);
    }
    
    public function getCmtInfosByID($art_id,$pageSize){
        $pageNo = isset($_GET['pageNo'])?$_GET['pageNo']:1;
        $offset = ($pageNo-1)*$pageSize;
        $sql = "select c.*, u.user_image from bg_comment as c left join bg_user as u on c.cmt_user=u.user_name where c.art_id =$art_id order by c.cmt_time desc limit $offset,$pageSize";
        return $this->dao->fetchAll($sql);
    }
}
