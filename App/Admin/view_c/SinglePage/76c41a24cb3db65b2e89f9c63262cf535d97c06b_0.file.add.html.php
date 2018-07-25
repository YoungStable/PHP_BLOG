<?php
/* Smarty version 3.1.30, created on 2018-02-24 14:20:09
  from "D:\wamp64\www\blog\App\Admin\View\SinglePage\add.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a910419de1454_69518107',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '76c41a24cb3db65b2e89f9c63262cf535d97c06b' => 
    array (
      0 => 'D:\\wamp64\\www\\blog\\App\\Admin\\View\\SinglePage\\add.html',
      1 => 1519443846,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../Public/public.html' => 1,
  ),
),false)) {
function content_5a910419de1454_69518107 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:../Public/public.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php echo '<script'; ?>
 type="text/javascript" src="/App/Admin/Public/ckeditor/ckeditor.js"><?php echo '</script'; ?>
> 
<div class="admin">
  <div class="tab">
    <div class="tab-head"> <strong>单页管理</strong>
      <ul class="tab-nav">
        <li class="active"><a href="#tab-set">添加单页</a></li>
      </ul>
    </div>
    <div class="tab-body"> <br />
      <div class="tab-panel active" id="tab-set">
        <form method="POST" class="form-x" action="index.php?p=Admin&c=SinglePage&a=addDeal" enctype="multipart/form-data">
          <div class="form-group">
            <div class="label">
              <label for="sitename">单页标题</label>
            </div>
            <div class="field">
              <input type="text" class="input" id="title" name="title" size="50" placeholder="单页标题" data-validate="required:请填写您的单页标题" />
            </div>
          </div>
          <div class="form-group">
            <div class="label">
              <label for="readme">单页内容</label>
            </div>
            <div class="field">
              <textarea name="content" id="content" class="input" rows="8" cols="50" placeholder="请填写单页内容" data-validate="required:请填写单页内容"></textarea>
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
</html><?php }
}
