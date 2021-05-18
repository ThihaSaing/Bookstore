<?php
	if (!isset($_SESSION)) {
		session_start();
	}
	if ($_SESSION["logined_in"]!=true)
	 {
		$_SESSION["error"]="Please login!";
		header("location:http://localhost/bookstore/view/user_login_view.php");
	}
	require_once "../controller/Book.php";
	$book_id=$_GET['id'];
	$book=new Book();
	$book->delete($book_id);
?>