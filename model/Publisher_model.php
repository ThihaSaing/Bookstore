<?php
require_once "db_connection.php";
class Publisher_model
{
	function get_all()
	{
		$result=mysql_query("SELECT * FROM publisher");
		return $result;
	}
	function get($publisher_id)
	{
		$result=mysql_query("SELECT * FROM publisher WHERE id='$publisher_id'")or die(mysql_error());
		return $result;
	}
	function create($pub_name)
	{
		//var_dump($auth_name);die();
		mysql_query("INSERT INTO publisher(name) VALUES ('$pub_name')")or die(mysql_error());
	}
	function update($publisher_id,$publisher_name)
	{
		mysql_query("UPDATE publisher SET `name`='$publisher_name' WHERE `id`='$publisher_id'");
	}
}
?>