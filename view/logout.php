<?php
	session_start();
	session_unset();
	session_destroy();
	header("location:http://localhost/bookstore/view/user_login_view.php");
?>