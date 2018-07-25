<?php
/* Smarty version 3.1.30, created on 2018-02-24 14:09:35
  from "D:\wamp64\www\blog\App\Front\View\Public\header.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a91019f046952_48839752',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3f1cd3a08c5fe8f845df88a7aae8f5baf42482dd' => 
    array (
      0 => 'D:\\wamp64\\www\\blog\\App\\Front\\View\\Public\\header.html',
      1 => 1519444549,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a91019f046952_48839752 (Smarty_Internal_Template $_smarty_tpl) {
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

    <a href="index.php?p=Front&c=SinglePage&a=index&page_id=2">关于我</a></nav>
  </header><?php }
}
