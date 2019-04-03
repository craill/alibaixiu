<?php
$name=$_POST['name'];
$slug=$_POST['slug'];
require_once './tools/mysql.php';
$sql="insert into categories (name,slug) values('$name','$slug')";
$res=my_zsg($sql);
if ($res) {
    echo '{ "code":250, "msg":"ok" }';
    }else{
        echo '{ "code":251, "msg":"fail" }';
    };