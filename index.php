<?php 
require_once './public/init.php';//载入配置文件
require_once './public/function.php';//载入函数文件
date_default_timezone_set('PRC');//设置时区(无需修改)
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
<script src="./js/layer/layer.js"></script>
<link rel="stylesheet" type="text/css" href="./css/style.css">
<script type="text/javascript">
function checkdomain(){  //表单输入验证
    var domain_name = checkform.domain.value;
    if(domain_name == ""){
     layer.msg('请输入域名');
     return false;
    }
}
function msgNull(){
  layer.msg('未查询到相关记录');
}
</script>
<body>
<div class="top">
    <div class="title">
      <?php echo WEBNAME; ?><!-- 网站标题 -->
    </div>
</div>
<div class="col-lg-3"></div>
<div class="col-lg-6">
	 <!-- 输入区开始 -->
	  <form action="" name="checkform" id="checkform" onsubmit="return checkdomain()" method="post">
	  <div class="input-group" style="margin-top:50px;">
	  <input type="text" class="form-control" style="height:50px;font-size:15px" placeholder="请输入二级域名" name="domain" id="domain">
	  <span class="input-group-btn">
	    <button class="btn btn-default" type="submit" style="height:50px">查询</button>
	  </span>
	  </div>
	  </form>
	 <!-- 输入区结束 -->
     
	    
     
  	<?php // 查询验证开始
	if(isset($_POST['domain'])){   //判断post提交开始

		$domain=$_POST['domain'];
		$time=date("Y-m-d");
  
		$con=mysqli_connect($link['host'],$link['username'],$link['password'],$link['dbname']);//链接数据库
    	$sql = "select * from domain where domain='{$domain}'";
    	$result = mysqli_query($con, $sql);
    
    	$row = mysqli_fetch_assoc($result);
      if($row!=NULL){  //判断数据库是否有记录开始
    	$diff = diffBetweenTwoDays($row['time'], $time);//函数计算剩余时间
    	$notice="";
    	if($diff <= 0){
      		$notice="已到期";
    	}else if($diff <= 3){
          $notice="请及时续期";
      }
		;
		//显示区开始
		echo "<table class='table table-bordered' style='margin-top:50px'>
       		  <tr>
       		  <td style='width:10%'>ID</td>
       		  <td style='width:30%'>域名</td>
       		  <td style='width:30%'>到期时间</td>
       		  <td style='width:30%'>剩余时间</td>
       		  </tr>";
     	echo "<tr class='success'>
           <td>{$row['id']}</td>
           <td>{$row['domain']}</td>
           <td>{$row['time']}</td>
           <td>还有{$diff}天<span style='color:red'>({$notice})</span></td>
           </tr>";
           echo "</table>";
       }
         else{
         	echo "<script type='text/javascript'>
                  msgNull();
         	      </script>";
          // 显示区结束
         }//判断数据库是否有记录结束
        mysqli_close($con);//关闭数据库链接
	}//判断post提交结束

	// 查询验证结束
 	?>

</div>

<?php require_once 'public/footer.php' ?>
</body>
</html>

