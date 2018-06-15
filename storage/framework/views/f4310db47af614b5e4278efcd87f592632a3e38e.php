<!doctype html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>发表</title>
    <script src="./js/jquery-3.1.1.min.js"></script>
    <style>
        *{
            padding: 0;
            margin: 0;
        }
        body{
            min-width: 320px;
            max-width: 700px;
        }
        #publish{
            width:100%;
        }
        .menu{
            position: fixed;
            bottom: 10px;
        }
        .text{
            width: 100%;
            border: 0px solid #000000;
            padding: 10px 0 0 10px;
        }
        #submit{
            position: fixed;
            bottom: 10px;
            right:10px;
            border: none;
            padding: 5px 20px;
            border-radius: 20px;
            color: #ffffff;
            background: #484848;
        }
    </style>
</head>
<body>
    <form action="">
        <div id="publish" class="text">
            <p style="color:#848484">在此输入内容：</p>
        </div>
        <div id="menu" class="menu"></div>
        <button type="button" id="submit" onclick="getContent()">发送</button>
    </form>
    <script src="./js/wangEditor.min.js"></script>
    <script>
        var E = window.wangEditor;
        var editor = new E('#menu',"#publish");
        editor.customConfig.menus = [
            'image',
            'link',
            'text',
        ];
        editor.customConfig.uploadImgShowBase64 = true;
        editor.create();
        function getContent(){
            var data = {
                content:editor.txt.html()
            };
            $.ajaxSetup({
                headers:{
                    "X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url:'./publish',
                type:'post',
                data:data,
                dataType:'json',
                success:function (data) {
                    if(data.status=='ok'){
                        alert(data.msg);
                        window.location.href = "<?php echo e(url('/')); ?>";
                    }
                    if(data.status=="error"){
                        alert(data.msg);{
                            window.href = "<?php echo e(url('/publish')); ?>";
                        }
                    }
                },
                error:function (data) {
                    console.log(data);
                }
            })
        }
    </script>
</body>
</html>