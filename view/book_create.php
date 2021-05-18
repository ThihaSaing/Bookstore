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
	require_once "../controller/Author.php";
	require_once "../controller/Genre.php";
	require_once "../controller/Publisher.php";
	$author_model=new Author();
	$sql_author=$author_model->get_all();
	$genre_model=new Genre();
	$sql_genre=$genre_model->get_all();
	$publisher_model=new Publisher();
	$sql_publisher=$publisher_model->get_all();
?>
<div class="container">
<form action="../controller/Book.php" class="form-horizontal" method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<label name="cod_num" class="col-md-2 control-label">Code Number</label>
		<div class="col-md-8">
			<input type="text" name="cod_num" class="form-control"required>
		</div>
	</div>
	<div class="form-group">
		<label name="bkname" class="col-md-2 control-label">Book name</label>
		<div class="col-md-8">
			<input type="text" name="bkname" class="form-control"required>
		</div>
	</div>
	<div class="form-group">
		<label name="price" class="col-md-2 control-label">Price</label>
		<div class="col-md-8">
			<input type="text" name="price" class="form-control"required>
		</div>
	</div>
	<div class="form-group">
		<label name="edition" class="col-md-2 control-label">Edition</label>
		<div class="col-md-8">
			<input type="text" name="edition" class="form-control"required>
		</div>
	</div>
	<div class="form-group">
		<label name="b_img" class="col-md-2 control-label">Book Image</label>
		<div class="col-md-8">
			<input type="file" name="b_img" value="upload" id="file"required>
		</div>
	</div>
	<div class="form-group">
		<label name="b_pdf" class="col-md-2 control-label">Book Pdf</label>
		<div class="col-md-8">
			<input type="file" name="b_pdf" value="upload" id="file"required>
		</div>
	</div>
	<div class="form-group">
		<label name="descript" class="col-md-2 control-label">Description</label>
		<div class="col-md-8">
			<textarea name="some_comment" placeholder="..." class="form-control"></textarea>
		</div>
	</div>
	<div class="form-group">
		<label name="p_date" class="col-md-2 control-label">Publishing Date</label>
		<div class="col-md-8">
			<input type="date" name="p_date" class="form-control" placeholder="2016-12-31"required>
		</div>
	</div>
	<div class="form-group">
		<label name="s_author" class="col-md-2 control-label">Select Author</label>
		<div class="col-md-8">
			<select name="author_id" class="form-control">
			<?php
				while($author_result=mysql_fetch_assoc($sql_author)) 
				{?>
			<option value="<?= $author_result['id']?>"><?= $author_result['name'] ?></option>
			<?php } ?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label name="s_genre" class="col-md-2 control-label">Select Genre</label>
		<div class="col-md-8">
			<select name="genre_id" class="form-control">
			<?php
				while($genre_result=mysql_fetch_assoc($sql_genre)) 
				{?>
			<option value="<?= $genre_result['id']?>"><?= $genre_result['name'] ?></option>
			<?php } ?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label name="s_publisher" class="col-md-2 control-label">Select Publisher</label>
		<div class="col-md-8">
			<select name="publisher_id" class="form-control">
			<?php
				while($publisher_result=mysql_fetch_assoc($sql_publisher)) 
				{?>
			<option value="<?= $publisher_result['id']?>"><?= $publisher_result['name'] ?></option>
			<?php } ?>
			</select>
		</div>
	</div>
	<div class="form-group">
    	<div class="col-md-offset-2 col-md-8">
			<input type="submit" name="insert" value="Add" class="btn btn-default btn-primary">
		</div>
	</div>
</form>
</div>
<?php
	require_once "include/footer.php"; 
?>	