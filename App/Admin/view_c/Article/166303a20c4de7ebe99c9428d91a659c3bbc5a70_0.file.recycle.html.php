<?php
/* Smarty version 3.1.30, created on 2018-02-20 16:29:38
  from "D:\wamp64\www\blog\App\Admin\View\Article\recycle.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a8bdc727d8a32_16054095',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '166303a20c4de7ebe99c9428d91a659c3bbc5a70' => 
    array (
      0 => 'D:\\wamp64\\www\\blog\\App\\Admin\\View\\Article\\recycle.html',
      1 => 1519115314,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../Public/public.html' => 1,
  ),
),false)) {
function content_5a8bdc727d8a32_16054095 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'D:\\wamp64\\www\\blog\\vendor\\smarty\\plugins\\modifier.date_format.php';
$_smarty_tpl->_subTemplateRender("file:../Public/public.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php echo '<script'; ?>
>
	//定义页面载入事件
	$(function(){
		//获取btnAdd按钮
		$('#btnIndex').bind('click',function(){
			// 设置“添加文章”链接
			window.location.href = 'index.php?p=Admin&a=index&c=Article';
		});
	});
        $(function(){
		//获取btnAdd按钮
		$('#btnRecycle').bind('click',function(){
			// 设置“添加文章”链接
			window.location.href = 'index.php?p=Admin&a=recycle&c=Article';
		});
	});
<?php echo '</script'; ?>
>
<div class="admin">
	<form method="POST" action="index.php?p=Admin&c=Article&a=realDelMulti">
    <div class="panel admin-panel">
    	<div class="panel-head"><strong>文章列表</strong></div>
        <div class="padding border-bottom">
            <input type="button" class="button button-small checkall" name="checkall" checkfor="art_id[]" value="全选" />
            <input type="button" id="btnIndex" class="button button-small border-green" value="文章首页" />
            <input type="submit" class="button button-small border-yellow"  value="批量彻底删除" onclick="return confirm('你确认要批量彻底删除吗？')" />
            <input type="button" id="btnRecycle" class="button button-small border-blue" value="回收站" />
        </div>
        <table class="table table-hover">
        	<tr>
                <th width="45">选择</th>
                <th width="120">所属类别</th>
                <th width="200">文章标题</th>
                <th width="120">点击率</th>
                <th width="180">发布时间</th>
                <th width="100">操作</th>
            </tr>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['artInfo']->value, 'row');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
?>
            <tr>
                <td><input type="checkbox" name="art_id[]" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['art_id'];?>
" /></td>
                <td><?php echo $_smarty_tpl->tpl_vars['row']->value['cate_name'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['row']->value['hits'];?>
</td>
                <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['row']->value['addtime'],'%Y-%m-%d %H:%M:%S');?>
</td>
                <td>
                    <a class="button border-blue button-little" href="index.php?p=Admin&c=Article&a=recover&art_id=<?php echo $_smarty_tpl->tpl_vars['row']->value['art_id'];?>
">还原</a> 
                    <a class="button border-yellow button-little" href="index.php?p=Admin&c=Article&a=realDel&art_id=<?php echo $_smarty_tpl->tpl_vars['row']->value['art_id'];?>
" return confirm('你确认要彻底删除吗？')>彻底删除</a>
                </td>
            </tr>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        </table>
		<div class="panel-foot text-center">
            <a href="#"><<上一页</a>
            <a href="#">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#">4</a>
            <a href="#">5</a>
            <a href="#">下一页>></a>
			总页数：5
        </div>
    </div>
    </form>
    <br />
    <p class="text-right text-gray" style="float:right">基于<a class="text-gray" target="_blank" href="#">MVC框架</a>构建</p>
</div>
</body>
</html><?php }
}
