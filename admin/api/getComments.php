<?php
$pageIndex=$_GET['pageIndex'];
$pageSize=$_GET['pageSize'];
include_once './tools/mysql.php';
$start=($pageIndex-1)*10;
// 在数据库中查询comments.post_id=post.id,找到评论对应的文章
$sql="select c.id,c.author,c.content,p.title,c.created,c.status from comments c
inner join posts p
on c.post_id = p.id
where c.status != 'trashed'
limit $start,$pageSize";
//查询请求的回复数据
$res=mySelect($sql);
//1.求出总共的页码
    //1.1求出总共的回复数量
    $sql1="select c.id,c.author,c.content,p.title,c.created,c.status from comments c
inner join posts p
on c.post_id = p.id
where c.status != 'trashed'";
    $pageIndex=ceil(count(mySelect($sql1))/$pageSize);
//现在要求在响应体中还有页码信息,所以要重新生成一个关系型数组
$arr=array('data'=>$res,'pageIndex'=>$pageIndex);
echo json_encode($arr);