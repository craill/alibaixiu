# -------------接口文档----=----------
<!-- 判断登录账号密码是否正确 -->
type:'post';
url:admin/api/api.php
data:{email:email,
    password:paddword};
return: {'code':250,'msg':'ok'}
或{'code':251,'msg':'fail'}

<!-- 判断有没有session -->
type:'get';
url:api/checkLoading.php;
return:{'code':250,'msg':'ok'}
或{'code':251,'msg':'fail'}
<!-- 退出 -->
跳转到doLogout.php ,清除session,然后跳转到login.html
<!-- 获取用户信息,index页面加载完毕后,获取session,将session中存储的用于信息添加到页面中去 -->
type:get
url:api/getUserinfo.php,
return:session['userInfo]
<!-- 获取评论信息 -->
type:get
url:api/getComments.php
data:postIndex,postSize
datatype:json
return:[]
<!-- 评论信息的编辑 -->
type:post;
url:api/editComments.php;
data:id,status
<!-- 获取文章信息 -->
type:get;
url:api/getPosts.php;
data:pageIndex,pageSize;
dataType:'json';
success:function(){
    模板
}