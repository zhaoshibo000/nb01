<?php
echo 111;
$dsn="mysql:host=localhost;dbname=text1;port=3306;charset=utf8";
$user='root';
$pass='root';
try{
    $pdo=new PDO($dsn,$user,$pass);
    $sql="select * from student";
    $pdo_statment=$pdo->query($sql);
    if ($pdo_statment==false){
        echo'sql语句有问题'.$pdo->errorInfo()[2];
    }
    $arr=$pdo_statment->fetchAll(PDO::FETCH_ASSOC);
//    echo '<pre>';
//    print_r($arr);
//    echo '</pre>';
}catch (PDOException $e){
    echo '连接失败，错误信息如下'.$e->getMessage();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body{
            background-color: red;
            border: 1px solid black;
            width: 400px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<table border="1" cellspacing="0">
    <tr>
        <td>编号</td>
        <td>姓名</td>
        <td>年龄</td>
        <td>分数</td>
        <td>操作</td>
    </tr>
    <?php foreach ($arr as $key=>$value){ ?>
        <tr>
            <td><?php echo $value['id'] ?></td>
            <td><?php echo $value['name'] ?></td>
            <td><?php echo $value['age'] ?></td>
            <td><?php echo $value['fen'] ?></td>
            <td>
                <a href="javascript:void(0)" id="<?php echo $value['id']?>" class="btn">删除</a>
            </td>
        </tr>
    <?php } ?>
</table>
<script src="jquery.min.js"></script>
<script>
    $(".btn").click(function () {
        $id=$(this).attr("id");
        // console.log($id);
        $.ajax({
            url:'02.php',
            type:'post',
            data:{'key':$id},
            dataType:"json",
            success:function (data) {
                if(data.data==1){
                    alert('删除成功')
                    window.location.href='01.php'
                }else{
                    alert('删除失败')
                }
            }
        })
    })
</script>
</body>
</html>
