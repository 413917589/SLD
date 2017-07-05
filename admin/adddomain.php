<?php 
session_start();
if(!isset($_SESSION['username'])){
    header('Location: login.php');
}
require_once '../public/init.php';
 ?>
<!DOCTYPE html>
<html>
<meta charset="utf-8">
<head>
	<title><?php echo WEBNAME; ?></title>
</head>
<link rel="stylesheet" href="//cdn.bootcss.com/zui/1.7.0/css/zui.min.css">
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="//cdn.bootcss.com/zui/1.7.0/js/zui.min.js"></script>
<script src="../js/layer/layer.js"></script>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<script type="text/javascript">
function check_domain(){  //表单输入验证
    var domain_name = formdate.domain.value;
    var domain_date = formdate.date.value;
    if(domain_name == ""){
     layer.msg('请输入域名');
     return false;
    }else if(domain_date == ""){
     layer.msg('请选择日期');
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
     <?php require_once 'adddomain_home.php'; ?><!-- 载入首页 -->
 </div>
 <?php require_once '../public/footer.php' ?>
</body>
</html>
<?php 
if(isset($_POST['domain'])){    //判断post提交开始
    $domain=$_POST['domain'];
    $date=$_POST['date'];
    $con=mysqli_connect($link['host'],$link['username'],$link['password'],$link['dbname']);//链接数据库
    $sql = "insert into domain (id,domain,time) values ('','{$domain}','{$date}')";
    $result = mysqli_query($con, $sql);
    if(!$result){
    	echo "<script type='text/javascript'>
                  layer.alert('添加失败')
         	      </script>";
    }else{
    	echo "<script type='text/javascript'>
                  layer.alert('添加成功')
         	      </script>";
    } 
    mysqli_close($con);//关闭数据库链接
}//判断post提交结束

 ?>