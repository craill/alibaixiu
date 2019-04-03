<?php

// $avatar=$file['avatar'];
$slug=$_POST['slug'];
$nickname=$_POST['nickname'];
$bio=$_POST['bio'];
$email=$_POST['email'];
$avatar=$_FILES['avatar'];

$name=$avatar['name'];
$tmp=$avatar['tmp_name'];
$gbkName=iconv('utf-8','gbk',$name);
$path="../../uploads/$gbkName";
move_uploaded_file($tmp,$path);


$path="../../uploads/$name";

if ($name!='') {
    $sql="update users set avatar='$path',
    slug='$slug',
    nickname='$nickname',
    bio='$bio'
    where email='$email' ";
}else{
    $sql="update users set slug='$slug',
    nickname='$nickname',
    bio='$bio'
    where email='$email' ";
}

require_once './tools/mysql.php';
$res=my_zsg($sql);
if ($res) {
    if ($name!='') {
        session_start();
    $_SESSION['userInfo']['avatar']=$path;
    $_SESSION['userInfo']['slug']=$slug;
    $_SESSION['userInfo']['nickname']=$nickname;
    $_SESSION['userInfo']['bio']=$bio;
    }else{
        session_start();
        $_SESSION['userInfo']['slug']=$slug;
        $_SESSION['userInfo']['nickname']=$nickname;
        $_SESSION['userInfo']['bio']=$bio;
    }
   echo json_encode($_SESSION['userInfo']['avatar']);
    //  echo '{ "code":250, "msg":"ok" }';
}else{
    echo json_encode($sql);
    echo '{ "code":251, "msg":"fail" }';
};