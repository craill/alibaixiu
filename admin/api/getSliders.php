<?php
    $sql="select *from sliders ";
    require_once './tools/mysql.php';
    $res=mySelect($sql);
    echo json_encode($res);