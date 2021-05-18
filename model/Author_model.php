<?php
require_once "db_connection.php";
class Author_model
{
	function get_all()
	{
		$result=mysql_query("SELECT * FROM author");
		return $result;
	}
	function get($author_id)
	{
		$result=mysql_query("SELECT * FROM author WHERE id='$author_id'")or die(mysql_error());
		return $result;
	}
	function create($auth_name)
	{
		//var_dump($auth_name);die();
		mysql_query("INSERT INTO author(name) VALUES ('$auth_name')")or die(mysql_error());
	}
	function update($author_id,$author_name)
	{
		mysql_query("UPDATE author SET `name`='$author_name' WHERE `id`='$author_id'");
	}
	function delete()
	{
		
	}
}
?>