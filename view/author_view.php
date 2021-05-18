<?php
	if (!isset($_SESSION)) {
		session_start();
	}
	//var_dump('hello');die();
	if ($_SESSION["logined_in"]!=true) {
		$_SESSION["error"]="Please login!";
		header("location:http://localhost/bookstore/view/user_login_view.php");
	}
	require_once "../controller/Author.php";
	// require_once "include/header.php";
	// require_once "include/admin_nav.php";
	$author=new Author();
	$sql_author=$author->get_all();
?>
<script>
	$(document).ready(function() {$('#author').DataTable();} );
</script>
<div class="container">
	<table id="author" class="display" width="100%" cellspacing="0">
		<thead>
			<tr>
				<th>No</th>
				<th>Name</th>
				<th>Operation</th>
			</tr>
		</thead>
		<tbody>
				<?php while($author_array=mysql_fetch_assoc($sql_author))
						{
				?>
				<tr>			
					<td><?= $author_array['id'] ?></td>
					<td><?= $author_array['name'] ?></td>
					<td><a href="author_update.php?id=<?=$author_array['id']?>">Update</a></td>
				</tr>
				<?php } ?>
		</tbody>
	</table>
</div>	
<?php //require_once "include/footer.php"; ?>	