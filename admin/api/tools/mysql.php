<?php
function mySelect($sql) {
    $link = mysqli_connect('127.0.0.1', 'root', 'root', 'baixiu');
    $res = mysqli_query($link, $sql);
    mysqli_close($link);
    $arr = mysqli_fetch_all($res,1);
    return $arr;
};
function my_zsg($sql){

    //1. 连接数据库
    $link = mysqli_connect('127.0.0.1','root','root','baixiu');

    //2. 操作数据库
    $result = mysqli_query($link,$sql);
 //$rows=mysqli_affected_rows($link);
    //3. 关闭数据库
    mysqli_close($link);

    return $result;
    //return $rows;
}