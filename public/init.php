<?php 

	//设置数据库链接信息
	$link = array(

		 	'host' => 'localhost', //数据库地址
		 	'username' => 'domain', //数据库用户名
		 	'password' => 'domain', //数据库密码
		 	'dbname' => 'domain', //数据库名

		 	);
	
	//设置网页编码
	header("content-type:text/html;charset=utf-8");
    
	//设置网站标题
	define("WEBNAME", "SLD二级域名查询系统");

	//获取网站当前域名(此处无需修改)
	define("WEBROOT", dirname(__DIR__)."/");

    //设置时区
    date_default_timezone_set('PRC');//设置时区(无需修改)
    

 ?>