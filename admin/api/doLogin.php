<?php
$email=$_POST['email'];
$password=$_POST['password'];
$link=mysqli_connect('127.0.0.1','root','root','baixiu');
$sql="select * from users where email='$email'and password='$password'";
 $res=mysqli_query($link,$sql);
mysqli_close($link);
$arr=mysqli_fetch_all($res,1);
if (count($arr)>0) {
  echo '{"code":250,"msg":"ok"}';
  //如果登录成功设置一个session
  session_start();
  $_SESSION['userInfo']=$arr[0];
}else{
   echo '{"code":251,"msg":"fail"}';
}