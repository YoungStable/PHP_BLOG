<?php
/* Smarty version 3.1.30, created on 2018-02-27 15:15:54
  from "D:\wamp64\www\blog\App\Front\View\Article\index.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a9505aa0688b8_74615829',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '29bdd51d315d0be227b7c0eddb9d38b2f143d297' => 
    array (
      0 => 'D:\\wamp64\\www\\blog\\App\\Front\\View\\Article\\index.html',
      1 => 1519614318,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../Public/header.html' => 1,
    'file:../Public/aside.html' => 1,
  ),
),false)) {
function content_5a9505aa0688b8_74615829 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_truncate')) require_once 'D:\\wamp64\\www\\blog\\vendor\\smarty\\plugins\\modifier.truncate.php';
if (!is_callable('smarty_modifier_date_format')) require_once 'D:\\wamp64\\www\\blog\\vendor\\smarty\\plugins\\modifier.date_format.php';
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>黑色Html5响应式个人博客模板——主题《如影随形》</title>
<meta name="keywords" content="<?php echo $_smarty_tpl->tpl_vars['keywords']->value;?>
" />
<meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['description']->value;?>
" />
<link href="<?php echo @constant('CSS_DIR');?>
/base.css" rel="stylesheet">
<link href="<?php echo @constant('CSS_DIR');?>
/style.css" rel="stylesheet">
<link href="<?php echo @constant('CSS_DIR');?>
/media.css" rel="stylesheet">
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
<!--[if lt IE 9]>
<?php echo '<script'; ?>
 src="<?php echo @constant('JS_DIR');?>
/modernizr.js"><?php echo '</script'; ?>
>
<![endif]-->
</head>
<body>
<div class="ibody">
   <?php $_smarty_tpl->_subTemplateRender("file:../Public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

  <article>
    <h2 class="about_h">您现在的位置是：<a href="/">首页</a>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list']->value, 'row', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['row']->value) {
?>
        ><a href="index.php?p=Front&c=Article&a=index&cate_id=<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value;?>
</a>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    </h2>
    <div class="bloglist">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['artInfo']->value, 'row');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
?>
      <div class="newblog">
        <ul>
          <h3><a href="index.php?p=Front&c=Article&a=show&art_id=<?php echo $_smarty_tpl->tpl_vars['row']->value['art_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
</a></h3>
          <div class="autor"><span>作者：<?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
</span><span>分类：[<a href="/"><?php echo $_smarty_tpl->tpl_vars['row']->value['cate_name'];?>
</a>]</span><span>浏览（<a href="/"><?php echo $_smarty_tpl->tpl_vars['row']->value['hits'];?>
</a>）</span></div>
          <p><?php echo smarty_modifier_truncate(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['row']->value['content']),100,'...');?>
 <a href="index.php?p=Front&c=Article&a=show&art_id=<?php echo $_smarty_tpl->tpl_vars['row']->value['art_id'];?>
" target="_blank" class="readmore">全文</a></p>
        </ul>
          <figure><img src="/Uploads/thumbs/<?php echo $_smarty_tpl->tpl_vars['row']->value['thumb'];?>
" ></figure>
        <div class="dateview"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['row']->value['addtime'],'%Y-%m-%s');?>
</div>
      </div>
        <?php
}
} else {
?>

        <div class="newblog">
            该分类下暂无文章
        </div>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    </div>
    <div class="page"><?php echo $_smarty_tpl->tpl_vars['pageStr']->value;?>
</div>
  </article>
  <?php $_smarty_tpl->_subTemplateRender("file:../Public/aside.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

  <?php echo '<script'; ?>
 src="<?php echo @constant('JS_DIR');?>
/silder.js"><?php echo '</script'; ?>
>
  <div class="clear"></div>
  <!-- 清除浮动 --> 
</div>
</body>
</html>

<?php }
}
