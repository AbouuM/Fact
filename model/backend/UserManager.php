<?php 

require_once('model/Manager.php');

class UserManager extends Manager
{
	public function addUser($name, $fname, $alias, $birthday, $email, $pass, $phone)
	{
		$dbase = $this->dbConnect();

		$req = $dbase->prepare('INSERT INTO user(name, f_name, alias, birthday, email, password, phone, register_date) VALUES(?, ?, ?, ?, ?, ?, ?, NOW())');
		$req->execute(array($name, $fname, $alias, $birthday, $email, $pass, $phone));

		return $req;
	}

	public function getUser($alias, $pass)
	{
		$dbase = $this->dbConnect();

		$req = $dbase->prepare('SELECT * FROM user WHERE alias = ? AND password = ?');
		$req->execute(array($alias, $pass));
		$user = $req->fetch();

		return $user;
	}

	public function Users()
	{
		$dbase = $this->dbConnect();

		$req = $dbase->query('SELECT id, name, f_name, date_format(register_date, \'%d/%m/%Y\') AS date_enregistrer, status FROM user ORDER BY id DESC LIMIT 0,6');

		return $req;
	}

	public function listUsers()
	{
		$dbase = $this->dbConnect();

		$req = $dbase->query('SELECT id, name, f_name, alias, date_format(birthday, \'%d/%m/%Y\') AS date_naissance, email, phone, date_format(register_date, \'%d/%m/%Y\') AS date_enregistrer, status FROM user ');

		return $req;
	}

	public function updateStat($userId, $statut)
	{
		$dbase = $this->dbConnect();

		$req = $dbase->prepare('UPDATE user SET status = ? WHERE id = ?');
		$req->execute(array($statut, $userId));

		return $req;
	}

	public function account($userId)
	{
		$dbase = $this->dbConnect();

		$req = $dbase->prepare('SELECT id, name, f_name, alias, date_format(birthday, \'%d/%m/%Y\') AS date_naissance, email, phone, date_format(register_date, \'%d/%m/%Y\') AS date_enregistrer, status FROM user WHERE id = ?');
		$req->execute(array($userId));

		$user = $req->fetch();

		return $user;

	}
}