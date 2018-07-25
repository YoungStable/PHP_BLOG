<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class AdminModel extends Model{
    
    public function validate($admin_name,$admin_pass){
        //把密码、用户名的比对交给数据库，更为简洁，不采取拿出密码再转换后由PHP比对的方法
        $sql = "select * from bg_Admin where admin_name='$admin_name' and admin_pass=md5('$admin_pass')";
        //成功返回该记录所有字段的数组，失败则返回return
  
        return $this->dao->fetchRow($sql);
    }
    
    public function updateAdminInfo($admin_id){
        $login_ip = $_SERVER['REMOTE_ADDR'];
        $login_time = time();
        $sql = "update bg_admin set login_ip='$login_ip', login_time='$login_time', login_nums=login_nums+1 where admin_id='$admin_id'";
        
        return $this->dao->my_query($sql);
        
    }
}