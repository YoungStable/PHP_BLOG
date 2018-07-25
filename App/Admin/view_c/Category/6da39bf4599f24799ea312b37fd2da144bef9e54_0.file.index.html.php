<?php
/* Smarty version 3.1.30, created on 2018-02-14 12:15:45
  from "D:\wamp64\www\blog\App\Admin\View\Category\index.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a83b7f19a7968_69557400',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6da39bf4599f24799ea312b37fd2da144bef9e54' => 
    array (
      0 => 'D:\\wamp64\\www\\blog\\App\\Admin\\View\\Category\\index.html',
      1 => 1518581741,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../Public/public.html' => 1,
  ),
),false)) {
function content_5a83b7f19a7968_69557400 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:../Public/public.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php echo '<script'; ?>
>
	//定义页面载入事件
	$(function(){
		//获取btnAdd按钮
		$('#btnAdd').bind('click',function(){
			// 添加分类的链接
			window.location.href = 'index.php?p=Admin&c=Category&a=add';
		});
	});
<?php echo '</script'; ?>
>
<div class="admin">
    <form method="post" action="index.php?p=Admin&c=Category&a=delMulti">
        <div class="panel admin-panel">
            <div class="panel-head"><strong>分类列表</strong></div>
            <div class="padding border-bottom">
                <input type="button" class="button button-small checkall" name="checkall" checkfor="cate_id[]" value="全选" />
                <input type="button" id="btnAdd" class="button button-small border-green" value="添加分类" />
                <input type="submit" class="button button-small border-yellow" value="批量删除" onclick="return confirm('确认删除吗?')" />
                <input type="button" class="button button-small border-blue" value="回收站" />
            </div>
            <table class="table table-hover">
                <tr>
                    <th width="45">选择</th>
                    <th width="120">所属类别</th>
                    <th width="240">分类名称</th>
                    <th width="*">分类描述</th>
                    <th width="100">操作</th>
                </tr>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cateInfo']->value, 'row');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
?>
                <tr>
                    <td><input type="checkbox" name="cate_id[]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['cate_id'];?>
" /></td>
                    <td><?php echo $_smarty_tpl->tpl_vars['row']->value['cate_pid'];?>
</td>
                    <td>
                        <?php echo preg_replace('!^!m',str_repeat('-',(5*$_smarty_tpl->tpl_vars['row']->value['depth'])),$_smarty_tpl->tpl_vars['row']->value['cate_name']);?>

                    </td>
                    <td><?php echo $_smarty_tpl->tpl_vars['row']->value['cate_desc'];?>
</td>
                    <td>
                        <a class="button border-blue button-little" href="index.php?p=Admin&c=Category&a=edit&cate_id=<?php echo $_smarty_tpl->tpl_vars['row']->value['cate_id'];?>
">修改</a> 
                        <a class="button border-yellow button-little" href="index.php?p=Admin&c=Category&a=del&cate_id=<?php echo $_smarty_tpl->tpl_vars['row']->value['cate_id'];?>
" onclick="return confirm('确认删除吗?')">删除</a>
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
    <p class="text-right text-gray">基于<a class="text-gray" target="_blank" href="#">MVC框架</a>构建</p>
</div>
</body>
</html>
<?php }
}
