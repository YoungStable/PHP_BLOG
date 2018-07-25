<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class UserModel extends Model{
    public function isUserExisted($user_name){
        $sql="select * from bg_user where user_name='$user_name'";
        return $this->dao->fetchAll($sql);
    }
    
    public function insertUser($userInfo){
        extract($userInfo);
        $sql="insert into bg_user values (null,'$user_name','$user_pwd','$user_image','$user_time')";
        return $this->dao->my_query($sql);
    }
    
    public function loginCheck($user_name,$user_pwd){
        $sql = "select * from bg_user where user_name = '$user_name'and user_pwd = '$user_pwd'";
        return $this->dao->fetchRow($sql);
    }
}
