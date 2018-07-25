<?php
/* Smarty version 3.1.30, created on 2018-02-13 13:55:33
  from "D:\wamp64\www\blog\App\Admin\View\Manage\index.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a827dd5153161_74215397',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '591220f89ad049bce058074665e0ad3776b32fd4' => 
    array (
      0 => 'D:\\wamp64\\www\\blog\\App\\Admin\\View\\Manage\\index.html',
      1 => 1518501111,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../Public/public.html' => 1,
  ),
),false)) {
function content_5a827dd5153161_74215397 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once 'D:\\wamp64\\www\\blog\\vendor\\smarty\\plugins\\modifier.date_format.php';
$_smarty_tpl->_subTemplateRender("file:../Public/public.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="admin">
	<div class="line-big">
    	<div class="xm3">
        	<div class="panel border-back">
            	<div class="panel-body text-center">
                	<img src="<?php echo @constant('IMAGES_DIR');?>
/face.jpg" width="120" class="radius-circle" /><br />
                    <?php echo $_SESSION['admininfo']['admin_name'];?>

                </div>
                <div class="panel-foot bg-back border-back">您好，<?php echo $_SESSION['admininfo']['admin_name'];?>
，这是您第<?php echo $_SESSION['admininfo']['login_nums']+1;?>
次登录，
                    上次登录为<?php echo smarty_modifier_date_format($_SESSION['admininfo']['login_time'],'%Y-%m-%d %H:%M:%S');?>
。
                登录的IP为:<?php echo $_SESSION['admininfo']['login_ip'];?>
</div>
            </div>
            <br />
        	<div class="panel">
            	<div class="panel-head"><strong>站点统计</strong></div>
                <ul class="list-group">
                	<li><span class="float-right badge bg-red">88</span><span class="icon-user"></span> 会员</li>
                    <li><span class="float-right badge bg-main">828</span><span class="icon-file"></span> 文章</li>
                    <li><span class="float-right badge bg-main">828</span><span class="icon-shopping-cart"></span> 订单</li>
                    <li><span class="float-right badge bg-main">828</span><span class="icon-database"></span> 数据库</li>
                </ul>
            </div>
            <br />
        </div>
        <div class="xm9">
            <div class="alert">
                <div class="alert alert-yellow"><span class="close"></span><strong>提示：</strong>欢迎使用ICFrame框架！</div>
                <h4>基于ICFrame框架的blog介绍</h4>
                <p class="text-gray padding-top">该播客系统基于ICFrame框架，高效、简洁……</p>
            	<a target="_blank" class="button bg-dot icon-code" href="#"> 下载示例代码</a> 
            	<a target="_blank" class="button bg-main icon-download" href="#"> 下载ICFrame框架</a> 
            	<a target="_blank" class="button border-main icon-file" href="#"> ICFrame框架使用教程</a>
            </div>
            <div class="panel">
            	<div class="panel-head"><strong>系统信息</strong></div>
                <table class="table">
                	<tr><th colspan="2">服务器信息</th><th colspan="2">系统信息</th></tr>
                    <tr><td width="110" align="right">操作系统：</td><td><?php echo @constant('PHP_OS');?>
</td><td width="90" align="right">系统开发：</td><td><a href="#" target="_blank">ICFrame框架</a></td></tr>
                    <tr><td align="right">Web服务器：</td><td><?php echo $_SERVER['SERVER_SOFTWARE'];?>
</td><td align="right">主页：</td><td><a href="#" target="_blank">#</a></td></tr>
                    <tr><td align="right">服务器IP：</td><td><?php echo $_SERVER['SERVER_ADDR'];?>
</td><td align="right">演示：</td><td><a href="#" target="_blank">http://www.blog.com</a></td></tr>
                    <tr><td align="right">数据库：</td><td>MySQL</td><td align="right">群交流：</td><td><a href="#" target="_blank">12345678</a> (点击加入)</td></tr>
                </table>
            </div>
        </div>
    </div>
    <p class="text-right text-gray">基于<a class="text-gray" target="_blank" href="#">MVC框架</a>构建   来源:<a href="http://www.itcast.cn/" target="_blank">传智播客</a></p>
</div>
</body>
</html><?php }
}
