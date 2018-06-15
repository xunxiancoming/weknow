<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php if(session('profile')): ?>
    <ul>
        <li>
            <label for="">name:</label>
            <span><?php echo e(session('profile.name')); ?></span>
        </li>
        <li>
            <label for="">age:</label>
            <span><?php echo e(session('profile.age')); ?></span>
        </li>
        <li>
            <label for="">photo:</label>
            <img src="<?php echo e(asset(session('profile.path'))); ?>" alt="" width="100%" height="100%">
        </li>
        <li>
            <label for="">下载地址</label>
            <a href="/download">中国电信通道</a>
        </li>
    </ul>
<?php endif; ?>
</body>
</html>