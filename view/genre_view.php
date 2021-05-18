<?php
	if (!isset($_SESSION)) {
		session_start();
	}
	//var_dump('hello');die();
	if ($_SESSION["logined_in"]!=true) {
		$_SESSION["error"]="Please login!";
		header("location:http://localhost/bookstore/view/user_login_view.php");
	}
	require_once "../controller/Genre.php";
	// require_once "include/header.php";
	// require_once "include/admin_nav.php";
	$genre=new Genre();
	$sql_genre=$genre->get_all();
?>
<script>
	$(document).ready(function() {$('#genre').DataTable();} );
</script>
<div class="container">
	<table id="genre" class="display" width="100%" cellspacing="0">
		<thead>
			<tr>
				<th>No</th>
				<th>Name</th>
				<th>Operation</th>
			</tr>
		</thead>
		<tbody>
				<?php while($genre_array=mysql_fetch_assoc($sql_genre))
						{
				?>
				<tr>			
					<td><?= $genre_array['id'] ?></td>
					<td><?= $genre_array['name'] ?></td>
					<td><a href="genre_update.php?id=<?=$genre_array['id']?>">Update</a></td>
				</tr>
				<?php } ?>
		</tbody>
	</table>
</div>	
<?php //require_once "include/footer.php"; ?>	