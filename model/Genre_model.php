<?php
require_once "db_connection.php";
class Genre_model
{
	function get_all()
	{
		$result=mysql_query("SELECT * FROM genre");
		return $result;
	}
	function get($genre_id)
	{
		$result=mysql_query("SELECT * FROM genre WHERE id='$genre_id'")or die(mysql_error());
		return $result;
	}
	function create($gen_name)
	{
		//var_dump($auth_name);die();
		mysql_query("INSERT INTO genre(name) VALUES ('$gen_name')")or die(mysql_error());
	}
	function update($genre_id,$genre_name)
	{
		mysql_query("UPDATE genre SET `name`='$genre_name' WHERE `id`='$genre_id'");
	}
}
?>