<?php
session_start();
if (isset($_SESSION['userInfo'])) {
    echo '{"code":250,"msg":"ok"}';
}else{
    echo '{"code":251,"msg":"fail"}';
}