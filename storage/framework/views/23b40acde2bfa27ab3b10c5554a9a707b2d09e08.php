<!doctype html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>评论</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/font-awesome-4.7.0/css/font-awesome.min.css')); ?>">
    <style>
        *{
            padding: 0;
            margin: 0;
        }
        body{
            min-width: 320px;
            max-width: 700px;
        }
        .header{
            height: 50px;
            line-height: 50px;
            box-shadow: 0px 1px 2px #737580;
        }
        .header a{
            margin-left: 10px;
        }
        .header span{
            margin-left: 10px;
        }
        .content{
            margin-left: 10px;
        }
        .avator img{
            width: 50px;
            height: 50px;
            border-radius: 50px;
            margin-top: 10px;
            float: left;
        }
        .comment-info ul{
            list-style: none;
            float: left;
            margin-left: 20px;
            margin-top: 15px;
        }
        .comment-content{
            margin-top: 5px;
            margin-left: 70px;
            clear: both;
            width: 60%;
            margin-bottom: 10px;
        }
        .comment-like{
            margin-top: 20px;
            margin-right: 10px;
            float: right;
        }
        .line{
            margin-left: 80px;
            width: 80%;
            clear: both;
            border-top: 1px solid #b7b9c6;
        }
        .footer{
            position: fixed;
            bottom: 0px;
            height: 60px;
            width: 100%;
            padding-top: 10px;
            border-top: 1px solid #999999;
            width: 100%;
        }
        .img{
            float: left;
            margin:8px 10px;
            width: 5%;
        }
        .inputCo{
            float: left;
            border-radius: 5px;
            border: 1px solid #999999;
            padding-left: 5px;
            height: 40px;
            line-height: 20px;
            font-size:1rem;
            width: 60%;
        }
        .btn{
            margin-top: 8px;
            margin-right: 10px;
            float: right;
            border: none;
            padding: 5px 15px;
            color: white;
            background: #1b1e21;
            border-radius: 12px;
        }
    </style>
</head>
<body>
    <div class="header">
        <a href="/"><i class="fa fa-chevron-left"></i></a><span>消息详情</span>
    </div>
    <div class="content">
        <div class="avator">
            <img src="./images/timg.jpg" alt="">
        </div>
        <div class="comment-info">
            <ul>
                <li style="font-size: 0.9rem;font-family: 微软雅黑;font-weight: bold">nickname</li>
                <li style="font-size: 0.5rem;color: #b4b4b4">06/12</li>
            </ul>
            <div class="comment-like">10 <a href=""><i class="fa fa-thumbs-o-up"></i></a></div>
            <div class="comment-content">生活中不乏，家境丰裕，出来工作只是为了打发时间的人。不过你都说了，人创业公司还是要点干劲的人</div>
        </div>
    </div>
    <div class="line"></div>

    <div class="content">
        <div class="avator">
            <img src="./images/timg.jpg" alt="">
        </div>
        <div class="comment-info">
            <ul>
                <li style="font-size: 0.9rem;font-family: 微软雅黑;font-weight: bold">nickname</li>
                <li style="font-size: 0.5rem;color: #b4b4b4">06/12</li>
            </ul>
            <div class="comment-like">10 <a href=""><i class="fa fa-thumbs-o-up"></i></a></div>
            <div class="comment-content">生活中不乏，家境丰裕</div>
        </div>
    </div>
    <div class="line"></div>

    <div class="footer">
        <form action="">
            <div class="img"><i class="fa fa-file-photo-o fa-lg"></i></div>
            <textarea type="text" placeholder="评论：" class="inputCo" rows="2"></textarea>
            <input type="submit" value="发送" class="btn">
        </form>
    </div>
</body>
</html>