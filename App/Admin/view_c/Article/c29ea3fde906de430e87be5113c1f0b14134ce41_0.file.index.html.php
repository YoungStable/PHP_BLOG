<?php
/* Smarty version 3.1.30, created on 2018-02-22 11:33:07
  from "D:\wamp64\www\blog\App\Admin\View\Article\index.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a8e39f35d9ca7_80812755',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c29ea3fde906de430e87be5113c1f0b14134ce41' => 
    array (
      0 => 'D:\\wamp64\\www\\blog\\App\\Admin\\View\\Article\\index.html',
      1 => 1519270379,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../Public/public.html' => 1,
  ),
),false)) {
function content_5a8e39f35d9ca7_80812755 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'D:\\wamp64\\www\\blog\\vendor\\smarty\\plugins\\modifier.date_format.php';
$_smarty_tpl->_subTemplateRender("file:../Public/public.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php echo '<script'; ?>
>
	//定义页面载入事件
	$(function(){
		//获取btnAdd按钮
		$('#btnAdd').bind('click',function(){
			// 设置“添加文章”链接
			window.location.href = 'index.php?p=Admin&a=add&c=Article';
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
	<form method="POST" action="index.php?p=Admin&c=Article&a=delMulti">
    <div class="panel admin-panel">
    	<div class="panel-head"><strong>文章列表</strong></div>
        <div class="padding border-bottom">
            <input type="button" class="button button-small checkall" name="checkall" checkfor="art_id[]" value="全选" />
            <input type="button" id="btnAdd" class="button button-small border-green" value="添加文章" />
            <input type="submit" class="button button-small border-yellow"  value="批量删除" onclick="return confirm('你确认要批量删除吗？')" />
            <input type="button" id="btnRecycle" class="button button-small border-blue" value="回收站" />
        </div>
        <table class="table table-hover">
        	<tr>
                <th width="45">选择</th>
                <th width="120">所属类别</th>
                <th width="200">文章标题</th>
                <th width="120">点击率</th>
                <th width="180">发布时间</th>
                <th width="100">是否推荐</th>
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
                    <?php if ($_smarty_tpl->tpl_vars['row']->value['is_recommend'] == '1') {?>
                     <a class="button border-blue button-little" href="index.php?p=Admin&c=Article&a=ifRecommend&art_id=<?php echo $_smarty_tpl->tpl_vars['row']->value['art_id'];?>

                        &is_recommended=<?php echo $_smarty_tpl->tpl_vars['row']->value['is_recommend'];?>
&pageNo=<?php echo (($tmp = @$_GET['pageNo'])===null||$tmp==='' ? 1 : $tmp);?>
">已推荐</a>
                    <?php } else { ?>
                    <a class="button border-blue button-little" href="index.php?p=Admin&c=Article&a=ifRecommend&art_id=<?php echo $_smarty_tpl->tpl_vars['row']->value['art_id'];?>

                        &is_recommend=<?php echo $_smarty_tpl->tpl_vars['row']->value['is_recommend'];?>
&pageNo=<?php echo (($tmp = @$_GET['pageNo'])===null||$tmp==='' ? 1 : $tmp);?>
">未推荐</a>
                    <?php }?>
                </td>
                <td>
                    <a class="button border-blue button-little" href="index.php?p=Admin&c=Article&a=edit&art_id=<?php echo $_smarty_tpl->tpl_vars['row']->value['art_id'];?>
">修改</a> 
                    <a class="button border-yellow button-little" href="index.php?p=Admin&c=Article&a=del&art_id=<?php echo $_smarty_tpl->tpl_vars['row']->value['art_id'];?>
" return confirm('你确认要删除吗？')>删除</a>
                </td>
            </tr>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        </table>
		<div class="panel-foot text-center">
                  <?php echo $_smarty_tpl->tpl_vars['pageStr']->value;?>
      
        </div>
    </div>
    </form>
    <br />
    <p class="text-right text-gray" style="float:right">基于<a class="text-gray" target="_blank" href="#">MVC框架</a>构建</p>
</div>
</body>
</html><?php }
}
