<?php 
//获取提交过来的数据
$title = $_POST['title'];
$content = $_POST['content'];
$slug = $_POST['slug'];
$created = $_POST['created'];
$category = $_POST['category'];
$status = $_POST['status'];
   
$id=$_POST['id'];
//feature是文件，要用files拿
$feature = $_FILES['feature'];

//文件名
$name = $feature['name'];

//临时路径
$tmp = $feature['tmp_name'];

//转成GBK的图片名
$gbkName = iconv('utf-8','gbk',$name);

//准备一个上传文件的新路径
$path = "../../uploads/$gbkName";

//移动临时路径到新路径
move_uploaded_file($tmp,$path);


//导入工具
require_once "tools/mysql.php";

//准备sql语句
//注意数据库里feature字段保存的是路径，所以你不要传图片
//先把路径再转回UTF-8
$path = "../../uploads/$name";
//判断name是否为空,如果更改了图片,name有值,则在sql语句中修改图片路径
if ($name!="") {
    $sql = "update posts set 
    title='$title',
    content='$content',
    slug='$slug',
    feature='$path',
    created='$created',
    category_id='$category',
    status='$status' 
    where id='$id'";
}else
//如果没有图片修改,name为空字符串,则在sql语句中不修改图片路径
{
    $sql = "update posts set 
    title='$title',
    content='$content',
    slug='$slug',
    created='$created',
    category_id='$category',
    status='$status' 
    where id='$id'";
}



$result = my_zsg($sql);


if($result>0){
    //echo json_encode($status);
      echo '{ "code":250, "msg":"ok" }';
}else{
   // echo json_encode($sql);
    echo '{ "code":251, "msg":"fail" }';
};