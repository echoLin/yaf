<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-06-19 01:37:48
         compiled from "/Applications/MAMP/htdocs/yaf/application/views/index/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5278437365764f801b1dc14-90663973%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd08640a465daf8deeddf305e357bed37dce01f1c' => 
    array (
      0 => '/Applications/MAMP/htdocs/yaf/application/views/index/index.tpl',
      1 => 1466293061,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5278437365764f801b1dc14-90663973',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5764f801b80b12_41446756',
  'variables' => 
  array (
    'content' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5764f801b80b12_41446756')) {function content_5764f801b80b12_41446756($_smarty_tpl) {?><!DOCTYPE html>
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
    <title>厦大新生查询</title>
</head>
<body>
    <div class="content">
        <div class="page-header" style="border-bottom: 1px solid #9d9d9d">
            <h1><?php echo $_smarty_tpl->tpl_vars['content']->value;?>
</h1>
        </div>
        <form role="form" id='formget' style="text-align:left; padding:20px;font-size: 20px;
    font-weight: 700;">
            <div class="form-group">
                <label for="name">学号</label>
                <label for="alertName" id="alertName" style="color:rgba(243, 68, 68, 0.81); font-size:15px; display:none;">学号不能为空</label>
                <input type="text" class="form-control" id="name" placeholder="请输入学号" style="font-size:15px; height:40px;">
            </div>
            <div class="form-group">
                <lable for="num">密码</lable>
                <label for="alertNum" id="alertNum" style="color:rgba(243, 68, 68, 0.81); font-size:15px; display:none;">密码不能为空</label>
                <input type="password" class="form-control" id="num" placeholder="请输入密码" style="font-size:15px; height:40px;">
            </div>
            <div class="form-group" style="text-align:center;">
                <label for="alert" id="alertError" style="color:rgba(243, 68, 68, 0.81); font-size:15px; display:none;">绑定失败，请确认信息后重新绑定</label>
                <button type="button" class="btn btn-info" style="font-size:18px; height:40px;" onClick=search()>绑定</button>
            </div>
        </form>

        <form role="form", id="info" style="text-align:left; padding:50px;font-size: 20px;
    font-weight: 700;  display:none;">
            <div class="form-group" style="text-align:center;">
                <label>姓名：</label>
                <label for='name' id='infoName'></label>
            </div>
            <div class="form-group" style="text-align:center;">
                <label>学号：</label>
                <label for='stuNum' id='infoStuNum'></label>
            </div>
            <div class="form-group" style="text-align:center;">
                <label>录取通知书编号：</label>
                <label for='num' id='infoNum'></label>
            </div>
        </form>
    </div>
</body>
</html><?php }} ?>
