<?php
$sql="select * from categories ";
include_once './tools/mysql.php';
$res=mySelect($sql);
echo json_encode($res);