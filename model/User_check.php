<?php
require_once "db_connection.php";
class User_check
{
	function get($email,$password)
	{
		// var_dump($password);
		$password1=sha1($password);
		//  var_dump($password1);
		// var_dump($email,$password);die();
		 $result=mysql_query("SELECT * FROM users WHERE `email`='$email' AND `password`='$password1'") or die(mysql_error());

		 return $result;
	}
}
?>