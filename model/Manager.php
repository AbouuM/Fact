<?php 

class Manager
{
	protected function dbConnect()
	{
		$db = new PDO('mysql:host=localhost; dbname=projet_5; charset=utf8', 'root', 'root');
		return $db;
	}
}