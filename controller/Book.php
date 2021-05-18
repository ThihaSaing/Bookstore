<?php
require_once "../model/Book_model.php";
require_once "file_upload.php";
$book=new Book();//object
if (isset($_POST['insert'])) 
{
	$book->create();//goto function create()
}
if (isset($_POST['update'])) 
{
	$book->update();//goto function create()
}
class Book
{
	function get_all()
	{
		$book_model=new Book_model();
		$result=$book_model->get_all();
		return $result;
	}
	function get($book_id)
	{
		$book_model=new Book_model();
		$result=$book_model->get($book_id);
		return $result;
	}
	function create()
	{
		$cod_num=$_POST['cod_num'];
		$book_name=$_POST['bkname'];
		$price=$_POST['price'];
		$edition=$_POST['edition'];
		$description=$_POST['some_comment'];
		$publish_date=$_POST['p_date'];
		$author_id=$_POST['author_id'];
		$genre_id=$_POST['genre_id'];
		$publisher_id=$_POST['publisher_id'];
		
		
		$file_upload=new File_upload();
		$img=$file_upload->image_upload('b_img');

		$file_upload=new File_upload();
		$pdf=$file_upload->pdf_upload('b_pdf');

		// var_dump($img);die();
	 //  	var_dump($pdf);die();
	//  var_dump($auth_name);
		$book_model=new Book_model();
		$book_model->create($cod_num,$book_name,$price,$edition,$img,$pdf,$description,$publish_date,$author_id,$genre_id,$publisher_id);
		header("location:http://localhost/bookstore/view/book_view.php");
	}
	function update()
	{
		$book_id=$_POST['book'];
		$cod_num=$_POST['cod_num'];
		$book_name=$_POST['bkname'];
		$price=$_POST['price'];
		$edition=$_POST['edition'];
		$description=$_POST['some_comment'];
		$publish_date=$_POST['p_date'];
		$author_id=$_POST['author_id'];
		$genre_id=$_POST['genre_id'];
		$publisher_id=$_POST['publisher_id'];
		// var_dump($_POST);die();
		$file_upload=new File_upload();
		$img=$file_upload->image_upload('b_img');
		
		$file_upload=new File_upload();
		$pdf=$file_upload->pdf_upload('b_pdf');
		
		$book=new Book_model();
		$book->update($book_id,$cod_num,$book_name,$price,$edition,$img,$pdf,$description,$publish_date,$author_id,$genre_id,$publisher_id);
		header("location:http://localhost/bookstore/view/book_view.php");
	
	}
	function delete($book_id)
	{
		// $book_id=$_GET['id'];
		$book=new Book_model();
		$book->delete($book_id);
		header("location:http://localhost/bookstore/view/book_view.php");
	}
	function get_all_deleted()
	{
		$book_model=new Book_model();
		$result=$book_model->get_all_deleted();
		return $result;
	}
	function get_deleted($book_id)
	{
		$book_model=new Book_model();
		$result=$book_model->get_deleted($book_id);
		return $result;
	}
	function restore($book_id)
	{
		$book=new Book_model();
		$book->restore($book_id);
		header("location:http://localhost/bookstore/view/book_view.php");
	}
	function recent_add()
	{
		$book_model=new Book_model();
		$result=$book_model->recent_add();
		return $result;
		// var_dump($result);

	}
}
?>
