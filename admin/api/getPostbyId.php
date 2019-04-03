<?php
include_once './tools/mysql.php';
$id=$_GET['id'];
$sql="select *from posts where id=$id";
$res=mySelect($sql);
echo json_encode($res[0]);