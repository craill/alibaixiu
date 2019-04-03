<?php
$name=$_POST['name'];
$slug=$_POST['slug'];
$id=$_POST['id'];
require_once './tools/mysql.php';
$sql="update categories set name='$name',slug='$slug' where id='$id'";
$res=my_zsg($sql);
if ($res) {
    echo '{ "code":250, "msg":"ok" }';
    }else{
        echo '{ "code":251, "msg":"fail" }';
    };