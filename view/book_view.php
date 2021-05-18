<?php
	//session_save_path($_SERVER['DOCUMENT_ROOT']."/sessiontest/");
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
	require_once "../controller/Book.php";
	$book=new Book();
	$sql_book=$book->get_all();
?>
<script>
	$(document).ready(function() {$('#book').DataTable();} );
</script>
<div class="container">
	<table id="book" class="display" width="100%" cellspacing="0">
		<thead>
			<tr>
				<th>Book Name</th>
				<th>Price</th>
				<!-- <th>Edition</th> -->
				<!-- <th>Description</th> -->
				<th>Author Name</th>
				<th>Genre Name</th>
				<th>Publisher Name</th>
				<!-- <th>Action</th> -->
				<!-- <th>Action</th> -->
			</tr>
		</thead>
		<tbody>
				<?php while($book_array=mysql_fetch_assoc($sql_book))
						{
				?>
				<tr>			
					<!-- <td><?= $book_array['book_id'] ?></td> -->
					<td><a href="book_detail_view.php?id=<?=$book_array['book_id']?>"><?= $book_array['bookname'] ?></a></td>
					<td><?= $book_array['price'] ?></td>
					<!-- <td><?= $book_array['edition'] ?></td> -->
					<!-- <td><?= $book_array['description'] ?></td> -->
					<td><?= $book_array['au_name'] ?></td>
					<td><?= $book_array['ge_name'] ?></td>
					<td><?= $book_array['pu_name'] ?></td>
					<!-- <td><a href="book_update.php?id=<?=$book_array['book_id']?>">Update</a></td> -->
					<!-- <td><a href="book_delete.php?id=<?=$book_array['book_id']?>">Delete</a></td> -->
				</tr>
				<?php } ?>
		</tbody>
	</table>
</div>	
<?php require_once "include/footer.php"; ?>	