<?php
$id=$_POST['id'];
$status=$_POST['status'];
$link=mysqli_connect('127.0.0.1','root','root','baixiu');
$sql="update comments set status='$status' where id in($id)";
$res=mysqli_query($link,$sql);
if ($res) {
    echo '{"code":250,"msg":"ok"}';
}else{
    echo '{"code":251,"msg":"fail"}';
}