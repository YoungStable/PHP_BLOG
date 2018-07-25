<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class CategoryController extends PlatformController{
    public function indexAction(){
        $category = Factory::getModelInstance('CategoryModel');
        $cateInfo = $category->getCategory();
        $this->assign('cateInfo', $cateInfo);
        $this->display('index.html');
    }
    
    public function addAction(){
        $category = Factory::getModelInstance('CategoryModel');
        $cateInfo = $category->getCategory();
        $this->assign('cateInfo', $cateInfo);
        $this->display('add.html');
    }
    
    public function dealAddAction(){
        $cate = array();
        $cate['cate_name'] = $this->escapeData($_POST['cate_name']);
        $cate['cate_pid'] = $_POST['cate_pid'];
        $cate['cate_desc'] = $this->escapeData($_POST['cate_desc']);
        $cate['cate_sort'] = $this->escapeData($_POST['cate_sort']);
        
        //js的验证可能会被浏览器器端关闭，故还需要在服务器验证数据合法性
        if(empty($cate['cate_name'])||
                empty($cate['cate_desc'])||empty($cate['cate_sort']))
            $this->jump('index.php?p=Admin&c=Category&a=add','您填写的信息不完整！');
        
        if(!is_numeric($cate['cate_sort'])||(int)$cate['cate_sort']!=$cate['cate_sort']
                ||$cate['cate_sort']<0)
            $this->jump('index.php?p=Admin&c=Category&a=add','排序编号为1-50，请重新输入！');
        
        $category = Factory::getModelInstance('CategoryModel');
        if($category->insertCateData($cate))
            $this->jump('index.php?p=Admin&c=Category&a=index');
        else
            $this->jump ('index.php?p=Admin&c=Category&a=add','发生未知错误，分类添加失败!');
        
    }
    
    public function editAction(){
        $cate_id = $_GET['cate_id'];
        $category = Factory::getModelInstance('CategoryModel');
        $cateInfo = $category->getCategory();
        $this->assign('cateInfo', $cateInfo);
        $edit_cateInfo = $category->getCategoryInfoById($cate_id);
        $this->assign('edit_cateInfo', $edit_cateInfo);
        $this->display('edit.html');
    }
    
    public function dealEditAction(){
        $cate = array();
        $cate['cate_name'] = $this->escapeData($_POST['cate_name']);
        $cate['cate_pid'] = $_POST['cate_pid'];
        $cate['cate_desc'] = $this->escapeData($_POST['cate_desc']);
        $cate['cate_sort'] = $this->escapeData($_POST['cate_sort']);
        $cate['cate_id'] = $_POST['cate_id'];
        
        //js的验证可能会被浏览器器端关闭，故还需要在服务器验证数据合法性
        if(empty($cate['cate_name'])||
                empty($cate['cate_desc'])||empty($cate['cate_sort']))
            $this->jump("index.php?p=Admin&c=Category&a=edit&cate_id={$cate['cate_id']}",'您填写的信息不完整！');
        
        if(!is_numeric($cate['cate_sort'])||(int)$cate['cate_sort']!=$cate['cate_sort']
                ||$cate['cate_sort']<0)
            $this->jump("index.php?p=Admin&c=Category&a=edit&cate_id={$cate['cate_id']}",'排序编号为1-50，请重新输入！');
        
        $category = Factory::getModelInstance('CategoryModel');
        if($category->updateCateData($cate))
            $this->jump('index.php?p=Admin&c=Category&a=index');
        else
            $this->jump ("index.php?p=Admin&c=Category&a=edit&cate_id={$cate['cate_id']}",'发生未知错误，分类修改失败!');
        
    }
    
    public function delAction() {
        $cate_id = $_GET['cate_id'];
        $category = Factory::getModelInstance('CategoryModel');
        if($category->delCategory($cate_id))
            $this->jump('index.php?p=Admin&c=Category&a=index');
        else
            $this->jump ("index.php?p=Admin&c=Category&a=index",'发生未知错误，分类删除失败!');
    }
    
    public function delMultiAction(){
        if(!isset($_POST['cate_id']))
            $this->jump ("index.php?p=Admin&c=Category&a=index",'请先选择要删除的分类');
        $cate_id = $_POST['cate_id'];
        $category = Factory::getModelInstance('CategoryModel');
        if($category->delMultiCategory($cate_id))
            $this->jump('index.php?p=Admin&c=Category&a=index');
        else
            $this->jump ("index.php?p=Admin&c=Category&a=index",'发生未知错误，批量删除失败!');
    }

}