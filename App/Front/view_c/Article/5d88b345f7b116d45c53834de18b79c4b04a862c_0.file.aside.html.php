<?php
/* Smarty version 3.1.30, created on 2018-02-23 12:20:32
  from "D:\wamp64\www\blog\App\Front\View\Public\aside.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a8f969077bf79_17717303',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5d88b345f7b116d45c53834de18b79c4b04a862c' => 
    array (
      0 => 'D:\\wamp64\\www\\blog\\App\\Front\\View\\Public\\aside.html',
      1 => 1519358606,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../Public/copyright.html' => 1,
  ),
),false)) {
function content_5a8f969077bf79_17717303 (Smarty_Internal_Template $_smarty_tpl) {
?>
<aside>
    <div class="rnav">
       <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['subCate']->value, 'row', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['row']->value) {
?>
      <li class="rnav<?php echo $_smarty_tpl->tpl_vars['key']->value%4+1;?>
 "><a href="index.php?p=Front&c=Article&a=index&cate_id=<?php echo $_smarty_tpl->tpl_vars['row']->value['cate_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['cate_name'];?>
</a></li>
      <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    </div>
    <div class="ph_news">
      <h2>
        <p>点击排行</p>
      </h2>
      <ul class="ph_n">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sortByHits']->value, 'row', false, NULL, 'n1', array (
  'iteration' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_n1']->value['iteration']++;
?>
            <?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_n1']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_n1']->value['iteration'] : null) <= 3) {?>
        <li><span class="num<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_n1']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_n1']->value['iteration'] : null);?>
"><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_n1']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_n1']->value['iteration'] : null);?>
</span><a href="index.php?p=Front&c=Article&a=show&art_id=<?php echo $_smarty_tpl->tpl_vars['row']->value['art_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
</a></li>
            <?php } else { ?>
        <li><span><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_n1']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_n1']->value['iteration'] : null);?>
</span><a href="index.php?p=Front&c=Article&a=show&art_id=<?php echo $_smarty_tpl->tpl_vars['row']->value['art_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
</a></li>
            <?php }?>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

      </ul>
      <h2>
        <p>栏目推荐</p>
      </h2>
      <ul>
          <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sortByRecommend']->value, 'row');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
?>
          <li><a href="index.php?p=Front&c=Article&a=show&art_id=<?php echo $_smarty_tpl->tpl_vars['row']->value['art_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['title'];?>
</a></li>
          <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

      </ul>
      <h2>
        <p>最新评论</p>
      </h2>
      <ul class="pl_n">
        <dl>
          <dt><img src="<?php echo @constant('IMAGES_DIR');?>
/s8.jpg"> </dt>
          <dt> </dt>
          <dd>DanceSmile
            <time>49分钟前</time>
          </dd>
          <dd><a href="/">文章非常详细，我很喜欢.前端的工程师很少，我记得几年前yahoo花高薪招聘前端也招不到</a></dd>
        </dl>
        <dl>
          <dt><img src="<?php echo @constant('IMAGES_DIR');?>
/s7.jpg"> </dt>
          <dt> </dt>
          <dd>yisa
            <time>2小时前</time>
          </dd>
          <dd><a href="/">我手机里面也有这样一个号码存在</a></dd>
        </dl>
        <dl>
          <dt><img src="<?php echo @constant('IMAGES_DIR');?>
/s6.jpg"> </dt>
          <dt> </dt>
          <dd>小林博客
            <time>8月7日</time>
          </dd>
          <dd><a href="/">博客色彩丰富，很是好看</a></dd>
        </dl>
        <dl>
          <dt><img src="<?php echo @constant('IMAGES_DIR');?>
/003.jpg"> </dt>
          <dt> </dt>
          <dd>DanceSmile
            <time>49分钟前</time>
          </dd>
          <dd><a href="/">文章非常详细，我很喜欢.前端的工程师很少，我记得几年前yahoo花高薪招聘前端也招不到</a></dd>
        </dl>
        <dl>
          <dt><img src="<?php echo @constant('IMAGES_DIR');?>
/002.jpg"> </dt>
          <dt> </dt>
          <dd>yisa
            <time>2小时前</time>
          </dd>
          <dd><a href="/">我手机里面也有这样一个号码存在</a></dd>
        </dl>
      </ul>
      <h2>
        <p>最近访客</p>
        <ul>
          <img src="<?php echo @constant('IMAGES_DIR');?>
/vis.jpg"><!-- 直接使用“多说”插件的调用代码 -->
        </ul>
      </h2>
    </div>
    <?php $_smarty_tpl->_subTemplateRender("file:../Public/copyright.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

  </aside><?php }
}
