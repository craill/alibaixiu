<?php
session_start();
$obj=$_SESSION['userInfo'];
echo json_encode($obj);