<?php
include_once '../api/tools/mysql.php';
//文章总数
$sql="select *from posts where status!='trashed'";
$wenzhang=count(mySelect($sql));

//草稿总数
$sql="select *from posts where status='drafted'";
$caogao=count(mySelect($sql));
//分类总数
$sql="select *from categories";
$fenlei=count(mySelect($sql));
//评论总数
$sql="select *from comments where status!='rejected'";
$pinglun=count(mySelect($sql));
//待审核总数
$sql="select *from comments where status!='held'";
$daishenhe=count(mySelect($sql));

$pageInfo=array(
    'wenzhang'=>$wenzhang,
    'caogao'=>$caogao,
    'fenlei'=>$fenlei,
    'pinglun'=>$pinglun,
    'daishenhe'=>$daishenhe,
);
echo json_encode($pageInfo);