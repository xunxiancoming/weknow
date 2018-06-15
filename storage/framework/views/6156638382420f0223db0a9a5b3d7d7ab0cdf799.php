<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>测试csrf</title>
    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<form action="/query" method="post" enctype="multipart/form-data">
    <?php echo e(csrf_field()); ?>

    <input type="text" name="name" class="name" value="<?php echo e(old('name')); ?>">
    <input type="number" name="age" value="<?php echo e(old('age')); ?>">
    <input type="file" name="photo">
    <button type="button" class="zouni">走你</button>
    <input type="submit" value="提交">
</form>
<script>
//    $(".zouni").click(function () {
//        $.ajaxSetup({
//            headers: {
//                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//            }
//        });
//        var jsdata = {
//            name:'king',
//            sex:'mail',
//            age:'26'
//        };
//        $(".name").val(jsdata);
//        $.ajax({
//            url:'/query',
//            data:jsdata,
//            type:'post',
//            datatype:'json',
//            success:function (data) {
//                var json = JSON.stringify(data);
//                console.log(json.name);
//            }
//        });
//    })
</script>
</body>
</html>