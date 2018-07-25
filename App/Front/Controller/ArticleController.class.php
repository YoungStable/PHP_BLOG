<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class ArticleController extends PlatformController{
    public function indexAction(){
        $cate_id = $_GET['cate_id'];
        $article = Factory::getModelInstance('ArticleModel');
        $artInfo = $article->getArtInfo($cate_id);
        $this->assign('artInfo', $artInfo);
        
        $maxnum = $GLOBALS['conf']['Page']['maxnum'];
        $pageSize = $GLOBALS['conf']['Page']['pageSize'];
        $url = "index.php?p=Front&c=Article&a=index&cate_id=$cate_id&";
        $sum = $article->getSumByID($cate_id);
        $page = new Page($sum,$maxnum,9,$url);
        $pageStr = $page->str_pages();
        $this->assign('pageStr', $pageStr);

        $this->publicAction($cate_id);
        
        $this->display('index.html');
    }
    /*
     * 把公共的操作提取出来：面包屑导航栏、侧边栏的文章子类、侧边点击排行文章、侧边最新文章
     */
    public function publicAction($cate_id){
        $category = Factory::getModelInstance('CategoryModel');
        $subCate = $category->getSubCate($cate_id);
        $this->assign('subCate', $subCate);
        //由于ArticleModel对象是在调用该publicAction()的方法里获得的，故此处需要再获得一次
        $article = Factory::getModelInstance('ArticleModel');
        //获取当前类的所有子类，逆序放入list中
        $list = $article->getAllCate($cate_id);
        $this->assign('list', $list);       
        //获取当前分类下点击排行的文章，9为取前9名
        $sortByHits = $article->getSortByHits($cate_id,9);          
        $this->assign('sortByHits', $sortByHits);
        
        $sortByRecommend = $article->getSortByRecommend($cate_id,9);
        $this->assign('sortByRecommend', $sortByRecommend);
    }
    
    public function showAction(){
        $art_id = $_GET['art_id'];
        $article = Factory::getModelInstance('ArticleModel');
        //得在获取文章信息之前，就更新点击次数
        $article->updateHits($art_id);
        $artInfoByID = $article->getArtInfoByID($art_id);
        $this->assign('artInfoByID', $artInfoByID);
        $cate_id = $artInfoByID['cate_id'];
        
        $this->publicAction($cate_id);
        $prev = $article->getPrevArt($cate_id,$art_id);
        $next = $article->getNextArt($cate_id,$art_id);
        $this->assign('prev', $prev);
        $this->assign('next', $next);
        
        $maxnum = $GLOBALS['conf']['Page']['maxnum'];
        $pageSize = 5;
        $url = "index.php?p=Front&c=Article&a=show&art_id=$art_id&";
        $comment = Factory::getModelInstance('CommentModel');
        $sum = $comment->getRowCountByArtID($art_id);
        $page = new Page($sum,$maxnum,$pageSize,$url);
        $pageStr = $page->str_pages();
        $this->assign('pageStr', $pageStr);
        
        $cmtInfos = $comment->getCmtInfosByID($art_id,$pageSize);
        $this->assign('cmtInfos', $cmtInfos);
        
        $this->display('show.html');
    }
    
    public function commentAction(){
        if(!isset($_SESSION['userInfo']))
            $this->jump ('index.php?p=Front&c=User&a=login','请先登陆后再进行评论操作！');
        $cmtInfo = array();
        $cmtInfo['art_id'] = $_POST['art_id'] ;
        $cmt_content = $_POST['content'];
        if(empty($cmt_content))
            $this->jump ("index.php?p=Front&c=Article&a=show&art_id={$cmtInfo['art_id']}",'评论内容不能为空');
        $cmtInfo['cmt_content'] = $cmt_content;
        $cmtInfo['cmt_time'] = time();
        $cmtInfo['cmt_user'] = $_SESSION['userInfo']['user_name'];
        $comment = Factory::getModelInstance('CommentModel');
        if($comment->insertComment($cmtInfo)){
            $article = Factory::getModelInstance('ArticleModel');
            $article->updateReplyNums($cmtInfo['art_id']);
            $this->jump ("index.php?p=Front&c=Article&a=show&art_id={$cmtInfo['art_id']}");
        }
        else{
            $this->jump ("index.php?p=Front&c=Article&a=show&art_id={$cmtInfo['art_id']}",'发生未知错误，评论失败');
        }
    }
}
