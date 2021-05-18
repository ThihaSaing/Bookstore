<?php
require_once "db_connection.php";
class Book_model
{
	function get_all()
	{
		return mysql_query("SELECT *,book.`id` as book_id,book.`name` as bookname,author.`name` as au_name,
			genre.`name` as ge_name,publisher.`name` as pu_name from book INNER JOIN author on 
			book.`author_id`=author.`id` INNER JOIN genre on book.`genre_id`=genre.`id` INNER JOIN 
			publisher on book.`publisher_id`=publisher.`id` WHERE book.`deleted`=0");
	}
	function get($book_id)
	{
		return mysql_query("SELECT *,book.`id` as book_id,book.`name` as bookname,author.`name` as au_name,
			genre.`name` as ge_name,publisher.`name` as pu_name from book INNER JOIN author on 
			book.`author_id`=author.`id` INNER JOIN genre on book.`genre_id`=genre.`id` INNER JOIN 
			publisher on book.`publisher_id`=publisher.`id` WHERE book.`deleted`=0 AND book.`id`='$book_id'");
	}
	function create($cod_num,$book_name,$price,$edition,$img,$pdf,$description,$publish_date,$author_id,
					$genre_id,$publisher_id)
	{
		//var_dump($auth_name);die();
		mysql_query("INSERT INTO book(name,genre_id,publisher_id,price,edition,image,save_pdf,publishing_date,
		code_number,description,author_id) VALUES ('$book_name','$genre_id','$publisher_id','$price','$edition',
		'$img','$pdf','$publish_date','$cod_num','$description','$author_id')");
	}
	function update($book_id,$cod_num,$book_name,$price,$edition,$img,$pdf,$description,$publish_date,$author_id,$genre_id,$publisher_id)
	{
		mysql_query("UPDATE book SET `name`='$book_name',`genre_id`='$genre_id',`publisher_id`='$publisher_id',`price`='$price',`edition`='$edition',`image`='$img',`save_pdf`='$pdf',`publishing_date`='$publish_date',`code_number`='$cod_num',`description`='$description',`author_id`='$author_id' WHERE `id`='$book_id'") or die(mysql_error());
	}
	function delete($book_id)
	{
		mysql_query("UPDATE book SET `deleted`=1 WHERE `id`='$book_id'") or die(mysql_error());
	}
	function get_all_deleted()
	{
		return mysql_query("SELECT *,book.`id` as book_id,book.`name` as bookname,author.`name` as au_name,
			genre.`name` as ge_name,publisher.`name` as pu_name from book INNER JOIN author on 
			book.`author_id`=author.`id` INNER JOIN genre on book.`genre_id`=genre.`id` INNER JOIN 
			publisher on book.`publisher_id`=publisher.`id` WHERE book.`deleted`=1");
	}
	function get_deleted($book_id)
	{
		return mysql_query("SELECT *,book.`id` as book_id,book.`name` as bookname,author.`name` as au_name,
			genre.`name` as ge_name,publisher.`name` as pu_name from book INNER JOIN author on 
			book.`author_id`=author.`id` INNER JOIN genre on book.`genre_id`=genre.`id` INNER JOIN 
			publisher on book.`publisher_id`=publisher.`id` WHERE book.`deleted`=1 AND book.`id`='$book_id'");
	}
	function restore($book_id)
	{
		mysql_query("UPDATE book SET `deleted`=0 WHERE `id`='$book_id'") or die(mysql_error());
	}
	function recent_add()
	{
		$result=mysql_query("SELECT *,book.`id` as book_id,book.`name` as bookname,author.`name` as au_name,
			genre.`name` as ge_name,publisher.`name` as pu_name from book INNER JOIN author on book.`author_id`=author.`id` INNER JOIN genre on book.`genre_id`=genre.`id` INNER JOIN publisher on book.`publisher_id`=publisher.`id` WHERE book.`deleted`=0 ORDER BY book.`id` DESC LIMIT 5");
		return $result;
	}
}
?>