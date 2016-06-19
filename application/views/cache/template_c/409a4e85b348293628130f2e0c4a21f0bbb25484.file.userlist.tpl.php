<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-06-19 02:08:07
         compiled from "/Applications/MAMP/htdocs/yaf/application/views/cms/userlist.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2405571475765e19c0db1a6-17620369%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '409a4e85b348293628130f2e0c4a21f0bbb25484' => 
    array (
      0 => '/Applications/MAMP/htdocs/yaf/application/views/cms/userlist.tpl',
      1 => 1466294885,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2405571475765e19c0db1a6-17620369',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5765e19c118ac4_42675530',
  'variables' => 
  array (
    'list' => 0,
    'user' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5765e19c118ac4_42675530')) {function content_5765e19c118ac4_42675530($_smarty_tpl) {?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap.min.css">
    <?php echo '<script'; ?>
 src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/js/index.js"><?php echo '</script'; ?>
>
    <link rel="stylesheet" href="/css/index.css">
    <title>绑定用户列表</title>
</head>
<body>
    <div class="content">
        <div class="page-header" style="border-bottom: 1px solid #9d9d9d">
            <h1>绑定用户列表</h1>
        </div>
        <ul>
            <?php  $_smarty_tpl->tpl_vars['user'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['user']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['user']->key => $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->_loop = true;
?>
            <li><?php echo $_smarty_tpl->tpl_vars['user']->value['xmuId'];?>
</li>
            <?php } ?>
        </ul>

    </div>
</body>
</html><?php }} ?>
