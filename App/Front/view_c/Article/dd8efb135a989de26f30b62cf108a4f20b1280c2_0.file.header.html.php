<?php
/* Smarty version 3.1.30, created on 2018-02-26 16:37:14
  from "D:\wamp64\www\blog\App\Front\View\Public\header.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a93c73a318306_56202127',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dd8efb135a989de26f30b62cf108a4f20b1280c2' => 
    array (
      0 => 'D:\\wamp64\\www\\blog\\App\\Front\\View\\Public\\header.html',
      1 => 1519630851,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a93c73a318306_56202127 (Smarty_Internal_Template $_smarty_tpl) {
?>
  <header>
    <h1>蜗牛的家</h1>
    <h2>给我一个小小的家，蜗牛的家，能挡风遮雨的地方，不必太大...</h2>
    <div class="logo"><a href="/"></a></div>
    <nav id="topnav"><a href="index.html">首页</a>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['topCate']->value, 'row');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
?>
        <a href="index.php?p=Front&c=Article&a=index&cate_id=<?php echo $_smarty_tpl->tpl_vars['row']->value['cate_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['cate_name'];?>
</a>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    <a href="index.php?p=Front&c=SinglePage&a=index&page_id=2">关于我</a>
    <?php if ((($tmp = @$_SESSION['userInfo']['user_id'])===null||$tmp==='' ? 0 : $tmp) > 0) {?>
    <a style='font-size: 12px;margin-left: 80px;padding: 0' href="index.php?p=Front&random=6">欢迎您，<?php echo $_SESSION['userInfo']['user_name'];?>
&nbsp;|</a>
    <a style='font-size: 12px;padding: 0' href="index.php?p=Front&c=User&a=logout">退出</a>
    <?php } else { ?>
    <a style='font-size: 12px;margin-left: 80px;padding: 0' href="index.php?p=Front&c=User&a=login">登录&nbsp;|</a>
    <a style='font-size: 12px;padding: 0' href="index.php?p=Front&c=User&a=register">注册</a>
    <?php }?>
    </nav>
  </header><?php }
}
