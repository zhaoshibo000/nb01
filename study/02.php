<?php
$id=$_POST['key'];
require_once 'DAOPDO.class.php';
$configs=array(
    'dbname'=>'text1'
);
$pdo=DAOPDO::getSingleton($configs);
$sql="delete from student where id=$id";
$arr=$pdo->query($sql);
if ($arr==true){
    echo json_encode(['data'=>1]);
}else{
    echo json_encode(['data'=>0]);
}