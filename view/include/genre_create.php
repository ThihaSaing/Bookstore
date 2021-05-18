<?php
	require_once "include/header.php";
	require_once "include/nav.php";
?>
<div class="container">
<form action="../controller/Genre.php" class="form-inline" method="POST">
	<div class="form-group">
	<label name="genname" class="label-control">Genre name</label>
	<input type="text" name="genname" class="form-control">
	</div>
	<input type="submit" name="insert" value="Add" class="btn btn-default btn-primary">
</form>
</div>
<?php require_once "include/footer.php"; ?>	