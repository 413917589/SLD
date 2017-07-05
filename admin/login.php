<?php 
session_start();
require_once '../public/init.php';//载入配置文件
 ?>
<!DOCTYPE html>
<html>
<meta charset="utf-8">
<head>
	<title><?php echo WEBNAME; ?>-后台管理</title><!-- 网站标题 -->
</head>
<link rel="stylesheet" href="//cdn.bootcss.com/zui/1.7.0/css/zui.min.css">
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="//cdn.bootcss.com/zui/1.7.0/js/zui.min.js"></script>
<script src="../js/layer/layer.js"></script>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<script type="text/javascript">
function checkform(){
    var user_name = loginform.username.value;
    var pass_word = loginform.password.value;
    if(user_name == "" || pass_word == "" ){
      layer.msg('用户名或密码不能为空');
      return false;
    }
}
</script>
<body>
<div class="top">
    <div class="title">
      <?php echo WEBNAME; ?>-后台管理<!-- 网站标题 -->
    </div>
</div>
<div class="col-md-5"></div>
<div class="col-md-2" style="margin-top:50px">
    <!-- 登录表单开始 -->
	  <form action="" id="login" name="loginform" onsubmit="return checkform()" method="post">
	  <div class="input-group">
	  <span class="input-group-addon">账号</span>
	  <input type="text" class="form-control" placeholder="用户名" style="height:40px" id="username" name="username">
	  </div>

	  <div class="input-group" style="margin-top:20px">
	  <span class="input-group-addon">密码</span>
	  <input type="password" class="form-control" placeholder="密码" style="height:40px" id="password" name="password">
	  </div>
    <button class="btn btn-block " type="submit" style="margin-top:20px">登录</button>
    </form>
    <!-- 登录表单结束 -->
</div>
<?php require_once '../public/footer.php' ?>
</body>
</html>
<?php 
//登录验证开始

if(isset($_POST['username']) && isset($_POST['password'])){  //判断post提交开始
  $username=$_POST['username'];
  $password=md5($_POST['password']);
  // echo $username.$password;

  $con=mysqli_connect($link['host'],$link['username'],$link['password'],$link['dbname']);//链接数据库
 

  $sql = "select * from admin where username='{$username}' and password='{$password}'";
  $result = mysqli_query($con, $sql);
  $row = mysqli_fetch_assoc($result);

  
  if(!$row){
    echo "<script type='text/javascript'>
          layer.msg('用户名或密码不正确');
          </script>";
  }else{
    $_SESSION['username']=$row['username'];
    header('Location: index.php');
  }

mysqli_close($con);//关闭数据库链接

}//判断post提交结束

//登录验证结束
 ?> 