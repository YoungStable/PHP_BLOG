<?php
/* Smarty version 3.1.30, created on 2018-02-24 14:19:31
  from "D:\wamp64\www\blog\App\Admin\View\SinglePage\index.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a9103f37ca7d8_12877526',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2d8d33c8f2b3b17c88aab93ff5c16bb6dc10dcdd' => 
    array (
      0 => 'D:\\wamp64\\www\\blog\\App\\Admin\\View\\SinglePage\\index.html',
      1 => 1519453168,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../Public/public.html' => 1,
  ),
),false)) {
function content_5a9103f37ca7d8_12877526 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_truncate')) require_once 'D:\\wamp64\\www\\blog\\vendor\\smarty\\plugins\\modifier.truncate.php';
$_smarty_tpl->_subTemplateRender("file:../Public/public.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php echo '<script'; ?>
>
	//定义页面载入事件
	$(function(){
		//获取btnAdd按钮
		$('#btnAdd').bind('click',function(){
			// 设置“添加文章”链接
			window.location.href = 'index.php?p=Admin&a=add&c=SinglePage';
		});
	});
<?php echo '</script'; ?>
>
<div class="admin">
	<form method="POST" action="index.php?p=Admin&c=SinglePage&a=delMulti">
    <div class="panel admin-panel">
    	<div class="panel-head"><strong>文章列表</strong></div>
        <div class="padding border-bottom">
            <input type="button" class="button button-small checkall" name="checkall" checkfor="page_id[]" value="全选" />
            <input type="button" id="btnAdd" class="button button-small border-green" value="添加文章" />
            <input type="submit" class="button button-small border-yellow"  value="批量删除" onclick="return confirm('你确认要批量删除吗？')" />
        </div>
        <table class="table table-hover">
        	<tr>
                <th width="45">选择</th>
                <th width="120">单页ID</th>
                <th width="200">标题</th>
                <th width="100">操作</th>
            </tr>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pageInfo']->value, 'row');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
?>
            <tr>
                <td><input type="checkbox" name="page_id[]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['page_id'];?>
" /></td>
                <td><?php echo $_smarty_tpl->tpl_vars['row']->value['page_id'];?>
</td>
                <td><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['row']->value['title'],10);?>
</td>
                <td>
                    <a class="button border-blue button-little" href="index.php?p=Admin&c=SinglePage&a=edit&page_id=<?php echo $_smarty_tpl->tpl_vars['row']->value['page_id'];?>
">修改</a> 
                    <a class="button border-yellow button-little" href="index.php?p=Admin&c=SinglePage&a=del&page_id=<?php echo $_smarty_tpl->tpl_vars['row']->value['page_id'];?>
" return confirm('你确认要删除吗？')>删除</a>
                </td>
            </tr>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        </table>
    </div>
    </form>
    <br />
    <p class="text-right text-gray" style="float:right">基于<a class="text-gray" target="_blank" href="#">MVC框架</a>构建</p>
</div>
</body>
</html><?php }
}
