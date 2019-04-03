<?php
$pageIndex=$_GET['pageIndex'];
$pageSize=$_GET['pageSize'];
$pageCategories=$_GET['pageCategories'];
$pageStatus=$_GET['pageStatus'];
$start=($pageIndex-1)*$pageSize;
include_once './tools/mysql.php';
$sql="select p.id,p.title,u.nickname,c.name,p.created,p.status 
from posts p
inner join users u
on p.user_id=u.id
inner join categories c
on p.category_id=c.id 
where p.status!='trashed'";
if ($pageCategories!='所有分类') {
    $sql.=" and c.name='$pageCategories'";
}
if ($pageStatus!='所有状态') {
    $sql.=" and p.status='$pageStatus'";
}
$sum=mySelect($sql);
$sql2=$sql."order by id desc limit $start,$pageSize ";
// $sql="select p.id,p.title,u.nickname,c.name,p.created,p.status 
// from posts p
// inner join users u
// on p.user_id=u.id
// inner join categories c
// on p.category_id=c.id
// where p.status!='trashed' limit $start,$pageSize";
$res=mySelect($sql2);
$num=count($sum);
$totalPages=ceil($num/$pageSize);
$arr=array('data'=>$res,'totalPages'=>$totalPages);
echo json_encode($arr);