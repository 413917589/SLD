<?php 
session_start();
if(!isset($_SESSION['username'])){
    header('Location: login.php');
}
require_once '../public/init.php';
require_once '../public/function.php';
       
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<link rel="stylesheet" href="//cdn.bootcss.com/zui/1.7.0/css/zui.min.css">
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="//cdn.bootcss.com/zui/1.7.0/js/zui.min.js"></script>
<script src="../js/layer/layer.js"></script>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<script type="text/javascript">
function checkSystem(){
    var username = system.username.value;
	var pwd1=system.password.value;
	var pwd2=system.password2.value;
	if(username == ""){
		layer.msg('管理员账号不得为空');
		return false;
	}
	if(pwd1 != pwd2){
		layer.msg('两次密码不一致');
     	return false;
	}
    
}

</script>
<body>
<div class="top">
    <div class="title">
      <?php echo WEBNAME; ?>-后台管理
    </div>
</div>
 <div class="col-md-2"></div>
 <div class="col-md-1" style="margin-top:10px">
		  <?php require_once 'nav.php'; ?><!-- 载入左侧导航 -->
 </div>
 <div class="col-md-7" style="margin-top:10px">
     <?php require_once 'system_home.php'; ?><!-- 载入首页 -->
 </div>
 <?php require_once '../public/footer.php' ?>
</body>
</html>
<?php 
if(isset($_POST['username'])){
	$id=$_POST['id2'];
   $username=$_POST['username'];
   $pwd1=$_POST['password'];
   $pwd2=$_POST['password2'];
   if($username == ""){
   	echo "<script type='text/javascript'>
                  layer.msg('用户名不得为空');
         	      </script>";
         	      exit;
   }
    if($pwd1 != $pwd2){
   	echo "<script type='text/javascript'>
                  layer.msg('两次密码不一致');
         	      </script>";
         	      exit;
   }
   $con=mysqli_connect($link['host'],$link['username'],$link['password'],$link['dbname']);//链接数据库
   if($pwd1!=""){
   	$md5pw=md5($pwd1);
    $sql = "update admin set username='{$username}',password='{$md5pw}' where id={$id}";
    $result = mysqli_query($con, $sql);
    if(!$result){
    		echo "<script type='text/javascript'>
                  layer.msg('修改失败');
         	      </script>";
         	      exit;
    }else{
    	echo "<script type='text/javascript'>
                  layer.msg('修改成功');
         	      </script>";       	      
    }
   }else{

   $sql2 = "update admin set username='{$username}' where id={$id}";
    $result2 = mysqli_query($con, $sql2);
    if(!$result2){
    		echo "<script type='text/javascript'>
                  layer.msg('修改失败');
         	      </script>";
         	      exit;
    }else{
    	echo "<script type='text/javascript'>
                  layer.msg('修改成功');
         	      </script>";      	      
    }
   }
mysqli_close($con);//关闭数据库链接
}

 ?>