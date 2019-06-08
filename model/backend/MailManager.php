<?php

require_once('model/Manager.php');

class MailManager extends Manager
{
	public function getMails()
	{
		$dbase = $this->dbConnect();
		$req = $dbase->query('SELECT id, name, email, subject, content, date_format(date_receipt, \'%d/%m/%Y à %Hh%imin%ss\') AS date_recu, status FROM Email ORDER BY id DESC');

		return $req;
	}

	public function receipt($name, $email, $subject, $message)
	{
		$dbase = $this->dbConnect();
		$req = $dbase->prepare('INSERT INTO Email(name, email, subject, content, date_receipt) VALUES(?, ?, ?, ?, NOW())');
		$req->execute(array($name, $email, $subject, $message));

		return $req;
	}
}