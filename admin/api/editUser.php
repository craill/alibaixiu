<?php
$nickname=$_POST['nickname'];
$email=$_POST['email'];
$slug=$_POST['slug'];
$password=$_POST['password'];
$userId=$_POST['userId'];
$sql="update  users set nickname='$nickname',email='$email',slug='$slug',password='$password' where id=$userId";
require_once './tools/mysql.php';
$res=my_zsg($sql);
if($res){
    // echo json_encode($sql);
   echo '{ "code":250, "msg":"ok" }';
}else{

    echo '{ "code":251, "msg":"fail" }';
}
