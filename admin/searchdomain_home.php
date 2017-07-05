<div class="panel panel-info">
     <div class="panel-heading">
       查询域名
     </div>
     <div class="panel-body">
   
     <table class="table table-bordered">
    <tr><td>id</td><td>域名</td><td>到期时间</td><td>剩余时间</td><td>操作</td></tr>

    <?php 
    $time=date("Y-m-d");
    $con=mysqli_connect($link['host'],$link['username'],$link['password'],$link['dbname']);//链接数据库
    $sql = "select * from domain order by id asc";
    $result = mysqli_query($con, $sql);
    
    while ($row=mysqli_fetch_assoc($result)) {
     $diff = diffBetweenTwoDays($row['time'], $time);	  
     echo "<tr>
          <td>{$row['id']}</td>
          <td>{$row['domain']}</td>
          <td>{$row['time']}</td>
          <td>{$diff}天</td>
          <td>
          <a onclick='update({$row['id']})'><i class='icon icon-pencil' style='margin-right:5px'></i></a>
          <a onclick='delete2({$row['id']})'><i class='icon icon-times'></i></a>
          </td></tr>";


    }
    mysqli_close($con);//关闭数据库链接
     ?>



     </table>
   


     </div>
     </div>