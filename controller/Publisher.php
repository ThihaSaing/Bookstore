<?php
require_once "../model/Publisher_model.php";
$publisher=new Publisher();//object
if (isset($_POST['insert'])) 
{
	$publisher->create();//goto function create()
}
if (isset($_POST['update'])) 
{
	$publisher->update();
}
class Publisher
{
	function get_all()
	{
		$publisher_model=new Publisher_model();
		$result=$publisher_model->get_all();
		return $result;
	}
	function get($publisher_id)
	{
		$publisher_model=new Publisher_model();
		$result=$publisher_model->get($publisher_id);
		return $result;
	}
	function create()
	{
		$pub_name=$_POST['pubname'];
		//var_dump($auth_name);
		$publisher_model=new Publisher_model();
		$publisher_model->create($pub_name);
		header("location:http://localhost/bookstore/view/publisher_create.php");
		die();
	}
	function update()
	{
		$publisher_id=$_POST['publisher'];
		$publisher_name=$_POST['pub_name'];
		// var_dump($author_id,$author_name);die();
		$publisher=new Publisher_model();
		$publisher->update($publisher_id,$publisher_name);
		header("location:http://localhost/bookstore/view/publisher_create.php");
		die();
	}
}
?>