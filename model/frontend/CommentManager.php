<?php 

require_once('model/Manager.php');

class CommentManager extends Manager
{
	public function getComment($postId)
	{
		$dbase = $this->dbConnect();

		$comments = $dbase->prepare('SELECT id, author, comment, date_format(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comment WHERE post_id = ? AND statut = \'publié\' ORDER BY comment_date DESC');
		$comments->execute(array($postId));

		return $comments;
	}

	public function addComments($postId, $author, $comment)
	{
		$dbase = $this->dbConnect();

		$req = $dbase->prepare('INSERT INTO comment(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
		$req->execute(array($postId, $author, $comment));

		return $comment;
	}

	public function getComments()
	{
		$dbase = $this->dbConnect();

		$req = $dbase->query('SELECT id, author, comment, date_format(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire, statut FROM comment ORDER BY id DESC LIMIT 0,15');

		return $req;
	}

	public function getListComment()
	{
		$dbase = $this->dbConnect();

		$req = $dbase->query('SELECT id, author, comment, date_format(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire, statut FROM comment ORDER BY id DESC');

		return $req;
	}

	public function updateStat($commentId, $statut)
	{
		$dbase = $this->dbConnect();

		$req = $dbase->prepare('UPDATE comment SET statut = ? WHERE id = ?');
		$req->execute(array($statut, $commentId));

		return $req;
	}

	public function adminComments($postId, $author, $comment)
	{
		$dbase = $this->dbConnect();

		$req = $dbase->prepare('INSERT INTO comment(post_id, author, comment, comment_date, statut) VALUES(?, ?, ?, NOW(), \'publié\')');
		$req->execute(array($postId, $author, $comment));

		return $req;
	}

	public function SelectComment($commentId)
	{
		$dbase = $this->dbConnect();


		$req = $dbase->prepare('SELECT id, post_id, author, comment, date_format(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire FROM comment WHERE id = ?');
		$req->execute(array($commentId));
		$comment = $req->fetch();

		return $comment;
	}

	public function upComment($commentId, $comment)
	{
		$dbase = $this->dbConnect();

		$req = $dbase->prepare('UPDATE comment SET comment = ? WHERE id = ?');
		$req->execute(array($comment, $commentId));

		return $req;
	}
}