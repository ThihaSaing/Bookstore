<?php require_once "include/header.php"; ?>
<?php require_once "include/nav.php"; ?>
<?php
	session_start();
	if (isset($_SESSION["error"])) {
		echo "<strong style='color:red'>".$_SESSION["error"]."</strong>";
		unset($_SESSION["error"]);
		//will delete just the name data
	}
?>
	<form action="../controller/User.php" method="POST">
		<div class="container">
		<div class="form-group">
		<div class="row">
			<label class="col-md-1"><b>Email</b></label>
			<div class="col-md-3">
			<input type="email" placeholder="...@gmail.com" class="form-control" name="email"required/>
			</div>
		</div>
		</div>
		<div class="form-group">
		<div class="row">
			<label class="col-md-1"><b>Password</b></label>
			<div class="col-md-3">
			<input type="password" placeholder="Enter password" class="form-control" name="psw"required/>
			</div>
		</div>
		</div>
			<button type="submit" value="login" class="btn btn-primary" name="login">Login</button>
		</div> 
	</form>
<?php require_once "include/footer.php"; ?>	