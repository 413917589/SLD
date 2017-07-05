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
function update(domainid){
  layer.open({
  type: 2,
  title: '修改域名',
  shadeClose: true,
  shade: 0.8,
  area: ['300px', '380px'],
  content: 'updete.php?id=' + domainid //iframe的url
});
}


function delete2(domainid){
  layer.open({
  type: 1
  ,title: false //不显示标题栏
  ,closeBtn: false
  ,area: '300px;'
  ,shade: 0.8
  ,id: 'LAY_layuipro' //设定一个id，防止重复弹出
  ,resize: false
  ,btn: ['确定删除', '残忍拒绝']
  ,btnAlign: 'c'
  ,moveType: 1 //拖拽模式，0或者1
  ,content: '<div style="padding: 50px; line-height: 22px; background-color: #393D49; color: #fff; font-weight: 300;">你确定要删除吗？</div>'
  ,success: function(layero){
    var btn = layero.find('.layui-layer-btn');
    btn.find('.layui-layer-btn0').attr({
      href: 'deletedomain.php?id='+domainid
      ,target: '_self'
    });
  }
});
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
     <?php require_once 'searchdomain_home.php'; ?><!-- 载入首页 -->
 </div>
 <?php require_once '../public/footer.php' ?>
</body>
</html>

