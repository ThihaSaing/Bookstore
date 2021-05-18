<?php
require_once "../model/Genre_model.php";
$genre=new Genre();//object
if (isset($_POST['insert'])) 
{
	$genre->create();//goto function create()
}
if (isset($_POST['update'])) 
{
	$genre->update();
}
class Genre
{
	function get_all()
	{
		$genre_model=new Genre_model();
		$result=$genre_model->get_all();
		return $result;
	}
	function get($genre_id)
	{
		$genre_model=new Genre_model();
		$result=$genre_model->get($genre_id);
		return $result;
	}
	function create()
	{
		$gen_name=$_POST['genname'];
		//var_dump($auth_name);
		$genre_model=new Genre_model();
		$genre_model->create($gen_name);
		header("location:http://localhost/bookstore/view/genre_create.php");
		die();
	}
	function update()
	{
		$genre_id=$_POST['genre'];
		$genre_name=$_POST['genrename'];
		// var_dump($author_id,$author_name);die();
		$genre=new Genre_model();
		$genre->update($genre_id,$genre_name);
		header("location:http://localhost/bookstore/view/genre_create.php");
		die();
	}
}
?>