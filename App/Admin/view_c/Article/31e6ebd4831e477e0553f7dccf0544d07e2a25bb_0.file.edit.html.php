<?php
/* Smarty version 3.1.30, created on 2018-02-20 14:06:19
  from "D:\wamp64\www\blog\App\Admin\View\Article\edit.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a8bbadbf2e663_91203986',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '31e6ebd4831e477e0553f7dccf0544d07e2a25bb' => 
    array (
      0 => 'D:\\wamp64\\www\\blog\\App\\Admin\\View\\Article\\edit.html',
      1 => 1519106775,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../Public/public.html' => 1,
  ),
),false)) {
function content_5a8bbadbf2e663_91203986 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:../Public/public.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php echo '<script'; ?>
 type="text/javascript" src="/App/Admin/Public/ckeditor/ckeditor.js"><?php echo '</script'; ?>
> 
<div class="admin">
  <div class="tab">
    <div class="tab-head"> <strong>文章管理</strong>
      <ul class="tab-nav">
        <li class="active"><a href="#tab-set">修改文章</a></li>
      </ul>
    </div>
    <div class="tab-body"> <br />
      <div class="tab-panel active" id="tab-set">
        <form method="POST" class="form-x" action="index.php?p=Admin&c=Article&a=editDeal" enctype="multipart/form-data">
          <div class="form-group">
            <div class="label">
              <label for="sitename">文章标题</label>
            </div>
            <div class="field">
              <input type="text" class="input" id="title" name="title" size="50" placeholder="文章标题" data-validate="required:请填写您的文章标题" value="<?php echo $_smarty_tpl->tpl_vars['artInfoByID']->value['title'];?>
"/>
            </div>
          </div>
          <div class="form-group">
            <div class="label">
              <label for="logo">缩略图</label>
            </div>
            <div class="field"> <a class="button input-file" href="javascript:void(0);">上传文件
              <input size="100" type="file" name="thumb" />
              <input type="hidden" name="thumb_bak" value="<?php echo $_smarty_tpl->tpl_vars['artInfoByID']->value['thumb'];?>
">
              </a> </div>
          </div>
          <div class="form-group">
            <div class="label">
              <label for="siteurl">文章作者</label>
            </div>
            <div class="field">
              <input type="text" class="input" id="author" name="author" size="50" placeholder="请填写文章作者" data-validate="required:请填写文章作者" value="<?php echo $_smarty_tpl->tpl_vars['artInfoByID']->value['author'];?>
"/>
            </div>
          </div>
          <div class="form-group">
            <div class="label">
              <label for="sitename">所属类别</label>
            </div>
            <div class="field">
              <select name="cate_id" class="select">
                  <option value="0">请选择类别</option>
                  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cateInfo']->value, 'row');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['row']->value['cate_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['artInfoByID']->value['cate_id'] == $_smarty_tpl->tpl_vars['row']->value['cate_id']) {?>selected="selected"<?php }?>><?php echo preg_replace('!^!m',str_repeat('-',(5*$_smarty_tpl->tpl_vars['row']->value['depth'])),$_smarty_tpl->tpl_vars['row']->value['cate_name']);?>
</option>
                  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

              </select>
            </div>
          </div>
          <div class="form-group">
            <div class="label">
              <label for="readme">文章描述</label>
            </div>
            <div class="field">
              <textarea name="art_desc" class="input" rows="2" cols="50" placeholder="请填写文章描述" data-validate="required:请填写文章描述"><?php echo $_smarty_tpl->tpl_vars['artInfoByID']->value['art_desc'];?>
</textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="label">
              <label for="readme">文章内容</label>
            </div>
            <div class="field">
              <textarea name="content" id="content" class="input" rows="8" cols="50" placeholder="请填写文章内容" data-validate="required:请填写文章内容"><?php echo $_smarty_tpl->tpl_vars['artInfoByID']->value['content'];?>
</textarea>
              <?php echo '<script'; ?>
>
                   CKEDITOR.replace('content',{
                       customConfig:'custom.js'
                   });
              <?php echo '</script'; ?>
>
            </div>
          </div>
          <div class="form-button">
              <input type="hidden" name="art_id" value="<?php echo $_smarty_tpl->tpl_vars['artInfoByID']->value['art_id'];?>
">
            <button name="submit" class="button bg-main" type="submit">提交</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div style='height:40px; border-bottom:1px #DDD solid'></div>
  <p class="text-right text-gray" style="float:right">基于<a class="text-gray" target="_blank" href="#">MVC框架</a>构建</p>
</div>
</body>
</html>
<?php }
}
