<?php
    $id=$_POST['id'];
    $sql="delete from users where id in($id)";
    require_once './tools/mysql.php';
    $res=my_zsg($sql);
    if ($res) {
        echo '{ "code":250, "msg":"ok" }';
        }else{
            echo '{ "code":251, "msg":"fail" }';
        };