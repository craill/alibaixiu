<?php
session_start();
  $id=$_SESSION['userInfo']['id'];
  $currentPassword=$_SESSION['userInfo']['password'];
  $old=$_POST['old'];
  $password=$_POST['password'];
  
  if ( $old!=$currentPassword) {
       echo '{ "code":252, "msg":"旧密码不正确" }';
        return;
  }

  $sql="update users set password='$password' where id='$id'";
      require_once './tools/mysql.php';
      $res=my_zsg($sql);
      if ($res) {
        
        echo '{ "code":250, "msg":"修改成功" }';
      }else{
        echo '{ "code":251, "msg":"修改失败" }';
      }
    
  