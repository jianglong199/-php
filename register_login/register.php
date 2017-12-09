<html>
	<h1>用户注册页面</h1>
	<form action="register.php" method="post">
		用户名：<input type="text" name="user_name" /><br/>
		密码：<input type="password" name="password" /><br/>
		<input type="submit" value="注册">
	</form>
</html>
<?php
	if($_SERVER['REQUEST_METHOD'] == 'GET'){
		exit;
	}
	$user_name = $_POST['user_name'];
	$password = $_POST['password'];
	if($user_name == ''){
		echo "fail：用户名不能为空！";
	}
	if($password == ''){
		echo "fail：用户名不能为空！";
	}
	//链接数据库
	$connect = mysql_connect('127.0.0.1','root','123456jl');
	mysql_select_db('user',$connect);
	if(!$connect){
		die("链接数据库失败".mysql_error());
	}else{
		//判断用户是否存在
		$sql = "select * from user where user_name='".$user_name."' limit 0,1";
		$resource = mysql_query($sql);
		if($resource === false){
			echo "fail：注册失败!";
			exit;
		}
		$user=mysql_fetch_assoc($resource);
		if($user !== false){
			echo "fail:用户名已经存在！";
			exit;
		}
		$sql = "insert into user(user_name,password) values ('".$user_name."','".$password."')";
		$rsl = mysql_query($sql);
		if(!$rsl){
			echo 'fail：注册失败';
		}else{
			echo 'success：注册成功';
		}
	}
?>
