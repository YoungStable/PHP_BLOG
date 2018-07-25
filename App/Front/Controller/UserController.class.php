<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class UserController extends PlatformController{
    public function registerAction(){
        $article = Factory::getModelInstance('ArticleModel');
        $latestArt = $article->getLatestArt(8);
        $this->assign('latestArt', $latestArt);
        $rmdArtByHits = $article->getRmdArtByHits(8);
        $this->assign('rmdArtByHits', $rmdArtByHits);
        
        $master = Factory::getModelInstance('MasterModel');
        $masterInfo = $master->getMasterInfo();
        $this->assign('masterInfo', $masterInfo);
        
        $this->display('register.html');
    }
    
    public function registerDealAction(){
        $userInfo = array();
        $user_name = $this->escapeData($_POST['user_name']);
        if(strlen($user_name)>20)
            $this->jump ('index.php?p=Front&c=User&a=register','用户名不合规范，长度不能超过20');
        if(empty($user_name))
            $this->jump ('index.php?p=Front&c=User&a=register','用户名不能为空或者空格');
        $user = Factory::getModelInstance('UserModel');
        if($user->isUserExisted($user_name))
            jump('index.php?p=Front&c=User&a=register','用户名已经存在');
        $userInfo['user_name'] = $user_name;
        
        $user_pwd = trim($_POST['user_pwd']);
        $repeat = trim($_POST['user_pwd1']);
        if(empty($user_pwd)||empty($repeat))
            $this->jump ('index.php?p=Front&c=User&a=register','密码和确认密码均不能为空!');
        if($user_pwd !== $repeat)
            $this->jump ('index.php?p=Front&c=User&a=register','两次输入的密码不一致!');
        $userInfo['user_pwd'] = md5($user_pwd);
        
        //判断是否有头像上传
        if($_FILES['user_image']['error'] != 4){
            $upload = Factory::getModelInstance('Upload');
            $allow = array('image/png','image/jpeg','image/jpg','image/gif');
            $path = UPLOADS_DIR.'user';
            if($result = $upload->uploadAction($_FILES['user_image'],$allow,$path))
                $userInfo['user_image'] = $result;
            else 
                $this->jump ('index.php?p=Front&c=User&a=register', Upload::$error);
        }
        else{
            $userInfo['user_image'] = 'default.jpg';
        }
        
        $userInfo['user_time'] = time();

        if($user->insertUser($userInfo))
            $this->jump ('index.php?p=Front&c=User&a=login','注册成功');
        else
            $this->jump ('index.php?p=Front&c=User&a=register','发生未知错误，注册失败！');
    }
    
    public function loginAction(){
        $article = Factory::getModelInstance('ArticleModel');
        $latestArt = $article->getLatestArt(8);
        $this->assign('latestArt', $latestArt);
        $rmdArtByHits = $article->getRmdArtByHits(8);
        $this->assign('rmdArtByHits', $rmdArtByHits);
        
        $master = Factory::getModelInstance('MasterModel');
        $masterInfo = $master->getMasterInfo();
        $this->assign('masterInfo', $masterInfo);
        
        $this->display('login.html');
    }
    
    public function loginDealAction(){
        $user_name = $this->escapeData($_POST['user_name']);
        $user_pwd = trim($_POST['user_pwd']);
        if(empty($user_pwd)||empty($user_name))
            $this->jump ('index.php?p=Front&c=User&a=login','密码和用户名均不能为空!');
        $user = Factory::getModelInstance('UserModel');
        if($result = $user->loginCheck($user_name, md5($user_pwd))){
            @session_start();
            $_SESSION['userInfo'] = $result;
            $this->jump('index.php?p=Front&c=Index&a=index');
        }
        else{
            $this->jump('index.php?p=Front&c=User&a=login','登录用户名或者密码错误!');
        }
    }
    
    public function logoutAction(){
        $_SESSION['userInfo'] = array();
        session_destroy();
        $this->jump('index.php?p=Front&c=Index&a=index');
    }
}
