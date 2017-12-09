<html>
	<form action="login.php" method="post">
		用户名：<input type="text" name="user_name" /><br/>
		密码：<input type="password" name="password" /><br/>
		<input type="button" value="登录" />
	</form>
</html>
<?php
	$user_name = $_POST['user_name'];
	$password = $_POST['password'];
	//链接数据库
	$connect = mysql_connect('127.0.0.1','root','');
	if(!$connect){
		echo 'fail：连接数据库失败!';
	}
	mysql_select_db('user',$conncet);
	$sql = "select * from user where user_name='".$user_name."' password='".$password."' limit 0,1";
	$rsl = mysql_query($sql,$connect);
	$user = mysql_fetch_assoc($rsl);
	if(!$user){
		echo "fail：用户名或密码错误！"
	}else{
		echo "success：登录成功！"
	}
?>
