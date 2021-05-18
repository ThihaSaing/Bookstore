<?php
require_once "../model/Author_model.php";
$author=new Author();//object
if (isset($_POST['insert'])) {
	$author->create();//goto function create()
}
if (isset($_POST['update'])) {
	$author->update();
}

class Author
{
	function get_all()
	{
		$author_model=new Author_model();
		$result=$author_model->get_all();
		return $result;
	}
	function get($author_id)
	{
		$author_model=new Author_model();
		$result=$author_model->get($author_id);
		return $result;
	}
	function create()
	{
		$auth_name=$_POST['authname'];
		//var_dump($auth_name);
		$author_model=new Author_model();
		$author_model->create($auth_name);
		header("location:http://localhost/bookstore/view/author_create.php");
		die();
	}
	function update()
	{
		$author_id=$_POST['author'];
		$author_name=$_POST['authname'];
		// var_dump($author_id,$author_name);die();
		$author=new Author_model();
		$author->update($author_id,$author_name);
		header("location:http://localhost/bookstore/view/author_create.php");
		die();
	}
	function delete()
	{
		
	}
}
?>
