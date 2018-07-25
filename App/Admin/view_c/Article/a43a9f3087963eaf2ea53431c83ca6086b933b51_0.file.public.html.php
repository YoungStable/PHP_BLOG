<?php
/* Smarty version 3.1.30, created on 2018-02-27 16:36:57
  from "D:\wamp64\www\blog\App\Admin\View\Public\public.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a9518a9331fc3_30894278',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a43a9f3087963eaf2ea53431c83ca6086b933b51' => 
    array (
      0 => 'D:\\wamp64\\www\\blog\\App\\Admin\\View\\Public\\public.html',
      1 => 1519442265,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a9518a9331fc3_30894278 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>个人博客后台管理系统</title>
    <link rel="stylesheet" href="<?php echo @constant('CSS_DIR');?>
/pintuer.css">
    <link rel="stylesheet" href="<?php echo @constant('CSS_DIR');?>
/admin.css">
    <?php echo '<script'; ?>
 src="<?php echo @constant('JS_DIR');?>
/jquery.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo @constant('JS_DIR');?>
/pintuer.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo @constant('JS_DIR');?>
/respond.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo @constant('JS_DIR');?>
/admin.js"><?php echo '</script'; ?>
>
    <link type="image/x-icon" href="/favicon.ico" rel="shortcut icon" />
    <link href="/favicon.ico" rel="bookmark icon" />
</head>

<body>
<div class="lefter">
    <div class="logo"><a href="#" target="_blank"><img src="<?php echo @constant('IMAGES_DIR');?>
/logo.png" alt="后台管理系统" /></a></div>
</div>
    <div class="righter nav-navicon" id="admin-nav">
        <div class="mainer">
            <div class="admin-navbar">
                <span class="float-right">
                    <a class="button button-little bg-main" href="/" target="_blank">前台首页</a>
                    <a class="button button-little bg-yellow" href="index.php?p=Admin&c=Admin&a=logout">注销登录</a>
                </span>
                <ul class="nav nav-inline admin-nav">
                    <li class="active"><a href="index.php?p=Admin&c=Manage&a=index" class="icon-home"> 开始</a>
                        <ul><li><a href="index.php?p=Admin&c=Category&a=index">分类管理</a></li><li><a href="index.php?p=Admin&c=Article&a=index">文章管理</a></li><li><a href="#">评论管理</a></li><li class="active"><a href="#">相册管理</a></li><li><a href="index.php?p=Admin&c=SinglePage&a=index">页面管理</a></li><li><a href="index.php?p=Admin&c=Master&a=index">站长管理</a></li><li><a href="#">友情链接</a></li></ul>
                    </li>
                    <li><a href="system.html" class="icon-cog"> 分类</a>
                        <ul><li><a href="#">全局设置</a></li><li class="active"><a href="#">系统设置</a></li><li><a href="#">会员设置</a></li><li><a href="#">积分设置</a></li></ul>
                    </li>
                    <li><a href="content.html" class="icon-file-text">文章管理</a>
                        <ul><li><a href="#">添加内容</a></li><li class="active"><a href="#">内容管理</a></li><li><a href="#">分类设置</a></li><li><a href="#">链接管理</a></li></ul>
                    </li>
                </ul>
            </div>
            <div class="admin-bread">
                <span>您好<?php echo $_SESSION['admininfo']['admin_name'];?>
,欢迎您的光临。</span>
                <ul class="bread">
                    <li><a href="index.php?p=Admin&c=Manage&a=index" class="icon-home"> 开始</a></li>
                    <li>后台首页</li>
                </ul>
            </div>
        </div>
    </div><?php }
}
