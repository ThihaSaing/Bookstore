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
require_once "../controller/author.php";
$author_id=$_GET['id'];
$author=new Author();
$sql=$author->get($author_id);
while ($data=mysql_fetch_assoc($sql)) 
{
	// var_dump($data);
?>
<div class="container">
<form action="../controller/Author.php" class="form-inline" method="POST">
	<div class="form-group">
		<label name="authname" class="control-label">Author name</label>
		<input type="hidden" value="<?=$data['id']?>" name="author">
		<input type="text" name="authname" class="form-control" value="<?=$data['name']?>">
	</div>
	<input type="submit" name="update" value="Update" class="btn btn-primary">
</form>
<?php
	}
?>
</div>
<?php require_once "include/footer.php"; ?>	