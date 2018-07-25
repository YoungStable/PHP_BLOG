<?php
/* Smarty version 3.1.30, created on 2018-02-27 15:16:10
  from "D:\wamp64\www\blog\App\Front\View\Article\show.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a9505ba182080_67108392',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '922bf793e22a3eff526bc3165fd655ef23b6defd' => 
    array (
      0 => 'D:\\wamp64\\www\\blog\\App\\Front\\View\\Article\\show.html',
      1 => 1519715474,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../Public/header.html' => 1,
    'file:../Public/aside.html' => 1,
  ),
),false)) {
function content_5a9505ba182080_67108392 (Smarty_Internal_Template $_smarty_tpl) {
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
<style type="text/css">
  .ds-replybox img {
    float:left;
    width:76px;
    height:76px;
  }
  textarea {
    box-shadow: none;
    color: #999;
    height: 54px;
    margin: 0;
    overflow: auto;
    padding: 10px;
    resize: none;
    width: 80%;
    margin-left:10px;
  }
  button {
    margin-top:10px;
    margin-left:85px;
    font-size: 14px;
    font-weight: bold;
    height: 32px;
    text-align: center;
    text-shadow: 0 1px 0 #fff;
    transition: all 0.15s linear 0s;
    width: 100px;
  }
  .otherlink dl {
    display:block;
    width:100%;
    height:65px;
    padding:20px 0;
    border-bottom:1px #DEDEDE solid;
  }
  .otherlink dt {
    float:left;
  }
  .otherlink h3 {
    color:#D23;
  }
  .otherlink h3,.otherlink p {
    line-height:22px;
    text-indent:10px;
  }
  .otherlink .msg {
     color:#333;
  }
  .otherlink .addtime {
     color:#999;
  }
  .logform input {
    width:140px;
    height:30px;
  }
</style>
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
<!--[if lt IE 9]>
<?php echo '<script'; ?>
 src="<?php echo @constant('JS_DIR');?>
/modernizr.js"><?php echo '</script'; ?>
>
<![endif]-->
</head>
<body>
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
    <div class="index_about">
      <h2 class="c_titile"><?php echo $_smarty_tpl->tpl_vars['artInfoByID']->value['title'];?>
</h2>
      <p class="box_c"><span class="d_time">发布时间：<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['artInfoByID']->value['addtime'],"%Y-%m-%d");?>
</span><span>编辑：<?php echo $_smarty_tpl->tpl_vars['artInfoByID']->value['author'];?>
</span><span>浏览（<?php echo $_smarty_tpl->tpl_vars['artInfoByID']->value['hits'];?>
）</span><span>评论（<?php echo $_smarty_tpl->tpl_vars['artInfoByID']->value['reply_nums'];?>
）</span></p>
      <ul class="infos">
        <?php echo $_smarty_tpl->tpl_vars['artInfoByID']->value['content'];?>

      </ul>
      <div class="nextinfo">
        <p>上一篇：<a href="index.php?p=Front&c=Article&a=show&art_id=<?php echo (($tmp = @$_smarty_tpl->tpl_vars['prev']->value['art_id'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['artInfoByID']->value['art_id'] : $tmp);?>
"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['prev']->value['title'])===null||$tmp==='' ? '已经是第一篇了' : $tmp);?>
</a></p>
        <p>下一篇：<a href="index.php?p=Front&c=Article&a=show&art_id=<?php echo (($tmp = @$_smarty_tpl->tpl_vars['next']->value['art_id'])===null||$tmp==='' ? $_smarty_tpl->tpl_vars['artInfoByID']->value['art_id'] : $tmp);?>
"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['next']->value['title'])===null||$tmp==='' ? '已经是最后一篇了' : $tmp);?>
</a></p>
      </div>
      <div style="clear:both; height:10px;"></div>
      <div class="otherlink">
        <h2>评论列表</h2>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cmtInfos']->value, 'row');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
?>
        <dl>
          <dt>
            <img width='50' height='50' src='/Uploads/user/<?php echo $_smarty_tpl->tpl_vars['row']->value['user_image'];?>
'>
          </dt>
          <dd>
            <h3>
				<?php echo $_smarty_tpl->tpl_vars['row']->value['cmt_user'];?>

            </h3>
            <p class='msg'><?php echo $_smarty_tpl->tpl_vars['row']->value['cmt_content'];?>
</p>
            <p class='addtime'>发布时间：<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['row']->value['cmt_time'],"%Y-%m-%d %T");?>
</p>
          </dd>
        </dl>
        <?php
}
} else {
?>

        <p>还没有任何评论，来抢一手沙发！</p>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

      </div>
	 <div style="clear:both; height:10px;"></div>
      <div class="otherlink">
        <h2>发布评论</h2>
      </div>
      <form action="index.php?p=Front&c=Article&a=comment" method="post">
      <textarea placeholder="说点什么吧…" title="Ctrl+Enter快捷提交" name="content"></textarea>
      <input type="hidden" name="art_id" value="<?php echo $_GET['art_id'];?>
">
	  <button type="submit" class="ds-post-button">发布</button></form>
     </div>
	 <div class="page"><?php echo $_smarty_tpl->tpl_vars['pageStr']->value;?>
</div>
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
