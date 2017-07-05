<?php 
session_start();
if(!isset($_SESSION['username'])){
    header('Location: login.php');
}
require_once '../public/init.php';
require_once '../public/function.php';
       

 $con=mysqli_connect($link['host'],$link['username'],$link['password'],$link['dbname']);//链接数据库
 

if(isset($_POST['id2'])){  

  $id2=$_POST['id2'];
  $domain=$_POST['domain'];
  $date=$_POST['date'];
  $sql2 = "update domain set domain='{$domain}',time='{$date}' where id={$id2}";
  $result2 = mysqli_query($con, $sql2);
  if($result2!=false){
  echo "<script>
  window.location.href='updete.php?id=$id2'
        </script>
  ";
  }
  mysqli_close($con);//关闭数据库链接
}


$id=$_GET['id'];

 $sql = "select * from domain where id='{$id}'";
 $result = mysqli_query($con, $sql);
 $row = mysqli_fetch_assoc($result);

 ?>

<!DOCTYPE html>
<html>
<head>
  <title><?php echo WEBNAME; ?></title>
</head>
<link rel="stylesheet" href="//cdn.bootcss.com/zui/1.7.0/css/zui.min.css">
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="//cdn.bootcss.com/zui/1.7.0/js/zui.min.js"></script>
<script src="../js/layer/layer.js"></script>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<body>

    <div style="padding:20px">
     <form class="form-inline" name="formupdate" action="" method="post">
        <div class="form-group">
          <label for="exampleInputEmail3">id</label>
          <input type="text" class="form-control" id="id" name="id" value="<?php echo $row['id']; ?>" disabled>
          <input type="hidden" id="id2" name="id2" value="<?php echo $row['id']; ?>">
        </div>
        <div class="form-group">
          <label for="exampleInputInviteCode3">域名</label>
          <input type="text" class="form-control" id="domain" name="domain" value="<?php echo $row['domain']; ?>">
        </div>
        <div class="form-group">
          <label for="exampleInputInviteCode3">到期时间</label>
          <input type="date" class="form-control" id="date" name="date" value="<?php echo $row['time']; ?>">
        </div>
        <button type="submit" class="btn btn-primary">确定修改</button>
      </form>
     </div>

</body>
</html>