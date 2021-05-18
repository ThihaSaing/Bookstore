<?php
	if (!isset($_SESSION)) {
		session_start();
	}
	//var_dump('hello');die();
	if ($_SESSION["logined_in"]!=true) {
		$_SESSION["error"]="Please login!";
		header("location:http://localhost/bookstore/view/user_login_view.php");
	}
	require_once "include/header.php";
	require_once "include/admin_nav.php";
?>
<div class="container">
<div class="form-group">
<form action="../controller/Author.php" class="form-inline" method="POST">
	<div class="form-group">
		<label name="authname" class="control-label">Author name</label>
		<input type="text" name="authname" class="form-control"required>
	</div>
	<input type="submit" name="insert" value="Add" class="btn btn-default btn-primary">
</form>
</div>
<?php require_once "author_view.php"; ?>
</div>
<?php require_once "include/footer.php"; ?>	