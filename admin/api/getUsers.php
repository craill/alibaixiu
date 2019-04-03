<?php
$sql="select * from users";
require_once '../api/tools/mysql.php';
$res=mySelect($sql);
echo json_encode($res);