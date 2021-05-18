<?php
	if (!isset($_SESSION)) {
		session_start();
	}
	//var_dump('hello');die();
	if ($_SESSION["logined_in"]!=true) {
		$_SESSION["error"]="Please login!";
		header("location:http://localhost/bookstore/view/user_login_view.php");
	}
	require_once "../controller/Publisher.php";
	require_once "include/header.php";
	require_once "include/admin_nav.php";
	$publisher=new Publisher();
	$sql_publisher=$publisher->get_all();
?>
<script>
	$(document).ready(function() {$('#publisher').DataTable();} );
</script>
<div class="container">
	<table id="publisher" class="display" width="100%" cellspacing="0">
		<thead>
			<tr>
				<th>No</th>
				<th>Name</th>
				<th>Operation</th>
			</tr>
		</thead>
		<tbody>
				<?php while($publisher_array=mysql_fetch_assoc($sql_publisher))
						{
				?>
				<tr>			
					<td><?= $publisher_array['id'] ?></td>
					<td><?= $publisher_array['name'] ?></td>
					<td><a href="publisher_update.php?id=<?=$publisher_array['id']?>">Update</a></td>
				</tr>
				<?php } ?>
		</tbody>
	</table>
</div>	
<?php require_once "include/footer.php"; ?>	