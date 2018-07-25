<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ArticleController extends PlatformController{
    public function indexAction(){
        $article = Factory::getModelInstance('ArticleModel');
        $artInfo = $article->getArticle();
        $this->assign('artInfo', $artInfo);
        
        $maxnum = $GLOBALS['conf']['Page']['maxnum'];
        $pageSize = $GLOBALS['conf']['Page']['pageSize'];
        $url = 'index.php?p=Admin&c=Article&a=index&';
        $sum = $article->getSum();
        $page = new Page($sum,$maxnum,$pageSize,$url);
        $pageStr = $page->str_pages();
        
        $this->assign('pageStr', $pageStr);
        $this->display('index.html');
        
    }
    
    public function addAction(){
        $category = Factory::getModelInstance('CategoryModel');
        $cateInfo = $category->getCategory();
        $this->assign('cateInfo', $cateInfo);
        $this->display('add.html');
    }
    
    public function addDealAction(){
        $art = array();
        $art['cate_id'] = $_POST['cate_id'];
        $art['title'] = $this->escapeData($_POST['title']);
        $art['art_desc'] = $this->escapeData($_POST['art_desc']);
        $art['content'] = addslashes($_POST['content']);
        $art['author'] = $this->escapeData($_POST['author']);
        
        if(empty($art['title'])||empty($art['art_desc'])
                ||empty($art['content'])||empty($art['author'])){
            $this->jump('index.php?p=Admin&c=Article&a=add','请将文章信息填写完整!');
        }
        
        if($_FILES['thumb']['error']!=4){
            $upload = Factory::getModelInstance('Upload');
            $allow = array('image/jpeg','image/png','image/gif','image/gif','image/jpg');
            $path = UPLOADS_DIR.'thumbs';
            $result = $upload->uploadAction($_FILES['thumb'],$allow,$path);
            if($result){
                $thumb = Factory::getModelInstance('Image');
                $max_w = 175;
                $max_h = 175;
                $src_file = UPLOADS_DIR.'thumbs/'.$result;
                if($thumb->makeThumb($max_w,$max_h,$src_file,$path))
                    $art['thumb'] = $result;
                else
                    $this->jump('index.php?p=Admin&c=Article&a=add', Image::$error);
            }else{
                $error = Upload::$error;
                $this->jump('index.php?p=Admin&c=Article&a=add', $error);
            }
        }
        else{
            $art['thumb'] = 'default.jpg';
        }
        $article = Factory::getModelInstance('ArticleModel');
        if($article->insertArtData($art))
            $this->jump ('index.php?p=Admin&c=Article&a=index');
        else
            $this->jump ('index.php?p=Admin&c=Article&a=add','未知错误！文章添加失败！');
    }
    
    public function editAction(){
        $art_id = $_GET['art_id'];
        $article = Factory::getModelInstance('ArticleModel');
        $artInfoByID = $article->getArticleByID($art_id);
        $this->assign('artInfoByID', $artInfoByID);
        
        $category = Factory::getModelInstance('CategoryModel');
        $cateInfo = $category->getCategory();
        $this->assign('cateInfo', $cateInfo);
        
        $this->display('edit.html');
    }
    
    public function editDealAction(){
        $art = array();
        $art['art_id'] = $_POST['art_id'];
        $art['cate_id'] = $_POST['cate_id'];
        $art['title'] = $this->escapeData($_POST['title']);
        $art['art_desc'] = $this->escapeData($_POST['art_desc']);
        $art['content'] = addslashes($_POST['content']);
        $art['author'] = $this->escapeData($_POST['author']);
        
        if(empty($art['title'])||empty($art['art_desc'])
                ||empty($art['content'])||empty($art['author'])){
            $this->jump("index.php?p=Admin&c=Article&a=add&art_id={$art['art_id']}",'请将文章信息填写完整!');
        }
        
        if($_FILES['thumb']['error']!=4){
            $upload = Factory::getModelInstance('Upload');
            $allow = array('image/jpeg','image/png','image/gif','image/gif','image/jpg');
            $path = UPLOADS_DIR.'thumbs';
            $result = $upload->uploadAction($_FILES['thumb'],$allow,$path);
            if($result){
                if($_POST['thumb_bak']!='default.jpg'){
                    unlink(UPLOADS_DIR.'thumb/'.$_POST['thumb_bak']);
                }
                $art['thumb'] = $result;
            }else{
                $error = Upload::$error;
                $this->jump('index.php?p=Admin&c=Article&a=add', $error);
            }
        }
        else{
            $art['thumb'] = $_POST['thumb_bak'];
        }
        $article = Factory::getModelInstance('ArticleModel');
        if($article->updateArtData($art))
            $this->jump ('index.php?p=Admin&c=Article&a=index');
        else
            $this->jump ("index.php?p=Admin&c=Article&a=add&art_id={$art['art_id']}",'未知错误！文章修改失败！');
    }
    
    public function delAction(){
        $art_id = $_GET['art_id'];
        $article = Factory::getModelInstance('ArticleModel');
        $result = $article->delArticle($art_id);
        if($result)
            $this->jump ('index.php?p=Admin&c=Article&a=index');
        else
            $this->jump ("index.php?p=Admin&c=Article&a=index",'未知错误！文章删除失败！');
    }
    
    public function delMultiAction() {
        if (!isset($_POST['art_id']))
            $this->jump("index.php?p=Admin&c=Article&a=index", '请先选择要删除的文章');
        $art_id = $_POST['art_id'];
        $article = Factory::getModelInstance('ArticleModel');
        if ($article->delMultiArticle($art_id))
            $this->jump('index.php?p=Admin&c=Article&a=index');
        else
            $this->jump("index.php?p=Admin&c=Article&a=index", '发生未知错误，批量删除失败!');
    }
    
    public function recycleAction(){
        $article = Factory::getModelInstance('ArticleModel');
        $artInfo = $article->getDeletedArt();
        $this->assign('artInfo', $artInfo);
        $this->display('recycle.html');
    }

    public function recoverAction(){
        $art_id = $_GET['art_id'];
        $article = Factory::getModelInstance('ArticleModel');
        $result = $article->recoverArticle($art_id);
        if($result)
            $this->jump ('index.php?p=Admin&c=Article&a=recycle');
        else
            $this->jump ("index.php?p=Admin&c=Article&a=recycle",'未知错误！文章恢复失败！');   
    }
    
    public function realDelAction(){
        $art_id = $_GET['art_id'];
        $article = Factory::getModelInstance('ArticleModel');
        $result = $article->realDelArticle($art_id);
        if($result)
            $this->jump ('index.php?p=Admin&c=Article&a=recycle');
        else
            $this->jump ("index.php?p=Admin&c=Article&a=recycle",'未知错误！文章彻底删除失败！');   
    }
    
    public function realDelMultiAction() {
        if (!isset($_POST['art_id']))
            $this->jump("index.php?p=Admin&c=Article&a=index", '请先选择要删除的文章');
        $art_id = $_POST['art_id'];
        $article = Factory::getModelInstance('ArticleModel');
        if ($article->realDelMultiArticle($art_id))
            $this->jump('index.php?p=Admin&c=Article&a=recycle');
        else
            $this->jump("index.php?p=Admin&c=Article&a=recycle", '发生未知错误，批量删除失败!');
    }
    
    public function ifRecommendAction(){
        $art_id = $_GET['art_id'];
        $is_recommend = $_GET['is_recommend'];
        $pageNo = $_GET['pageNo'];
        
        $article = Factory::getModelInstance('ArticleModel');
        $result = $article->updateRecommend($art_id,$is_recommend);
        if($result){
            $this->jump("index.php?p=Admin&c=Article&a=index&pageNo=$pageNo");
        }else{
            $this->jump("index.php?p=Admin&c=Article&a=index&pageNo=$pageNo",'发生未知错误，推荐文章失败！');
        }
    }
}