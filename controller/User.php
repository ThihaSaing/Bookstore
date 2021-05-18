<?php
session_start();
// require_once "../include/header.php";
// require_once "../include/nav.php";
require_once "../model/User_check.php";
$email=$_POST['email'];
$password=$_POST['psw'];
$user=new User();//object
if (isset($_POST['login'])) 
{
	$user->get($email,$password);//goto function get()
}
class User
{
	function get($email,$password)
	{
		$user_check=new User_check();
		$result=$user_check->get($email,$password);
		// var_dump(mysql_fetch_assoc($result));die();
		if($user=mysql_fetch_assoc($result)) 
		{
			
		 // 	while($user=mysql_fetch_array($result)) 
			// {
				$_SESSION["username"]=$user['name'];
				$_SESSION["logined_in"]=true;
				// var_dump($user);die();
				header("location:http://localhost/bookstore/view/book_view.php");
			//}
		}
		else
		{
	 		$_SESSION["error"]="Wrong username or password";
	 		header("location:http://localhost/bookstore/view/user_login_view.php");
	 	}
		// return $result;
	}
	


// require_once "includesss/footer.php"; 
}
?>	
