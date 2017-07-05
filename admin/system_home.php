<?php 
$con=mysqli_connect($link['host'],$link['username'],$link['password'],$link['dbname']);//链接数据库
$sql = "select * from admin";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        mysqli_close($con);//关闭数据库链接

      ?>
<div class="panel panel-info">
     <div class="panel-heading">
       管理设置
     </div>
     <div class="panel-body">
 <form class="form-horizontal" action="" name="system" onsubmit="return checkSystem()" method="post">
 <div class="form-group">
    <label for="exampleInputAccount4" class="col-sm-2">id</label>
    <div class="col-md-6 col-sm-10">
      <input type="text" class="form-control" id="id" name="id" value="<?php echo $row['id']; ?>" disabled>
          <input type="hidden" id="id2" name="id2" value="<?php echo $row['id']; ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="exampleInputAccount4" class="col-sm-2">账号</label>
    <div class="col-md-6 col-sm-10">
      <input type="text" class="form-control" id="username" name="username" value="<?php echo $row['username']; ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword4" class="col-sm-2">密码</label>
    <div class="col-md-6 col-sm-10">
      <input type="password" class="form-control" id="password" name="password" placeholder="留空则不修改">
    </div>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword4" class="col-sm-2">确认密码</label>
    <div class="col-md-6 col-sm-10">
      <input type="password" class="form-control" id="password2" name="password2" placeholder="留空则不修改">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">修改</button>
    </div>
  </div>
</form>
     </div>
     </div>

