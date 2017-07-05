<?php 
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
<script src="./js/layer/layer.js"></script>
<link rel="stylesheet" type="text/css" href="./css/style.css">
<body>

</body>
</html>
<?php 
if(isset($_GET['id'])){

	$id=$_GET['id'];
	$con=mysqli_connect($link['host'],$link['username'],$link['password'],$link['dbname']);//链接数据库
	$sql = "delete from domain where id={$id}";
    $result = mysqli_query($con, $sql);
    if(!$result){
        header("location:searchdomain.php");
    }else{
    	header("location:searchdomain.php");
    }

}else{

	echo "<script>
     layer.alert('非法操作');
	      </script>";
}

 mysqli_close($con);//关闭数据库链接
 ?>