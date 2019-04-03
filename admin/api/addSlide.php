<?php
$image=$_FILES['image'];
$text=$_POST['text'];
$link=$_POST['link'];
$name=$image['name'];
$tmp=$image['tmp_name'];
$nameGbk=iconv('utf-8','gbk',$name);
$path="../../uploads/$nameGbk";
move_uploaded_file($tmp,$path);
$path="../../uploads/$name";

include_once 'tools/mysql.php';
$sql="insert into sliders (image,text,link) values ('$path','$text','$link')";
$res=my_zsg($sql);
if ($res) {
    
        // echo json_encode($sql);
       echo '{ "code":250, "msg":"ok" }';
    }else{
    
        echo '{ "code":251, "msg":"fail" }';
    }

