<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>知道</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/index.css')); ?>">
    <link href="https://cdn.bootcss.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/font-awesome-4.7.0/css/font-awesome.min.css')); ?>">
    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
    <div class="wrapper">
        <div class="nav">
            <div class="nav-search">
                    <div class="nav-search-box"><i class="fa fa-search fa-lg"></i><input type="text" name="search" class="search"></div>
                    <div class="nav-search-publish"><a href="/publish"><i class="fa fa-camera fa-2x"></i></a></div>
            </div>
            <div class="top-nav-navigation">
                <a href="#">关注</a>
                <a href="#">推荐</a>
                <a href="#">附近</a>            
            </div>
        </div>
        <?php $__currentLoopData = $contents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="content">
            <div class="user-info">
                <img src="<?php echo e(asset('images/timg.jpg')); ?>" alt="" class="user-avator">
                <ul class="user-name">
                    <li class="name"><?php echo e($content->user->name); ?></li>
                    <li class="time"><?php echo e($content->created_at); ?></li>
                </ul>
                <div class="collection"><i class="fa fa-chevron-down"></i></div>                           
            </div>
            <div class="user-content">
                <?php echo $content->content; ?>

            </div>
            <div class="hot-comment">
                <img src="<?php echo e(asset('images/hot.gif')); ?>" alt="">
                <p>互联网掀起了第一产业的发展，lol</p>
            </div>
            <div class="content-option">
                <ul>
                    <li>
                        <a href=""><i class="fa fa-thumbs-o-up fa-lg" style="color: rgb(95, 93, 93);"></i></a>
                    </li>
                    <li>
                        <a href="/comment"><i class="fa fa-commenting-o fa-lg" style="color: rgb(95, 93, 93);"></i></a>
                    </li>
                    <li>
                        <a href=""><i class="fa fa-retweet fa-lg" style="color: rgb(95, 93, 93);"></i></a>
                    </li>
                    <li>
                        <a href=""><i class="fa fa-share-square-o fa-lg" style="color: rgb(95, 93, 93);"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="content-boder"></div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <div class="blank"></div>
        <div class="footer">
            <ul>
                <li>
                    <a href="#" class="selected"><i class="fa fa-home fa-lg"></i><br> 首页</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-users fa-lg"></i><br> 动态</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-search-plus fa-lg"></i><br>发现</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-user-o fa-lg"></i> <br> 我的</a>
                </li>  
            </ul>    
        </div>
    </div>
</body>
</html>