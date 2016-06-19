<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap.min.css">
    <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
    <script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <script src="/js/index.js"></script>
    <link rel="stylesheet" href="/css/index.css">
    <title>绑定用户列表</title>
</head>
<body>
    <div class="content">
        <div class="page-header" style="border-bottom: 1px solid #9d9d9d">
            <h1>绑定用户列表</h1>
        </div>
        <ul>
            {foreach from=$list item=user}
            <li>{$user['xmuId']}</li>
            {/foreach}
        </ul>

    </div>
</body>
</html>