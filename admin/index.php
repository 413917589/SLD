<?php 
session_start();
if(!isset($_SESSION['username'])){
    header('Location: login.php');
}
require_once '../public/init.php';
$time=date("Y-m-d");
$con=mysqli_connect($link['host'],$link['username'],$link['password'],$link['dbname']);//链接数据库
$sql = "select * from domain";
        $result = mysqli_query($con, $sql);
        $row = mysqli_num_rows($result);
        mysqli_close($con);//关闭数据库链接
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
     <?php require_once 'home.php'; ?><!-- 载入首页 -->


     
 </div>
<?php require_once '../public/footer.php' ?>
 
</body>
</html>