<?php 

require_once('model/Manager.php');

class CommentManager extends Manager
{
	public function getComment($postId)
	{
		$db = $this->dbConnect();

		$comments = $db->prepare('SELECT id, author, comment, date_format(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comment WHERE post_id = ? AND statut = \'publié\' ORDER BY comment_date DESC');
		$comments->execute(array($postId));

		return $comments;
	}

	public function addComments($postId, $author, $comment)
	{
		$db = $this->dbConnect();

		$req = $db->prepare('INSERT INTO comment(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
		$req->execute(array($postId, $author, $comment));

		return $comment;
	}

	public function getComments()
	{
		$db = $this->dbConnect();

		$req = $db->query('SELECT id, author, comment, date_format(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire, statut FROM comment ORDER BY id DESC LIMIT 0,15');

		return $req;
	}

	public function getListComment()
	{
		$db = $this->dbConnect();

		$req = $db->query('SELECT id, author, comment, date_format(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire, statut FROM comment ORDER BY id DESC');

		return $req;
	}

	public function updateStat($commentId, $statut)
	{
		$db = $this->dbConnect();

		$req = $db->prepare('UPDATE comment SET statut = ? WHERE id = ?');
		$req->execute(array($statut, $commentId));

		return $req;
	}

	public function adminComments($postId, $author, $comment)
	{
		$db = $this->dbConnect();

		$req = $db->prepare('INSERT INTO comment(post_id, author, comment, comment_date, statut) VALUES(?, ?, ?, NOW(), \'publié\')');
		$req->execute(array($postId, $author, $comment));

		return $req;
	}

	public function SelectComment($commentId)
	{
		$db = $this->dbConnect();


		$req = $db->prepare('SELECT id, post_id, author, comment, date_format(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire FROM comment WHERE id = ?');
		$req->execute(array($commentId));
		$comment = $req->fetch();

		return $comment;
	}

	public function upComment($commentId, $comment)
	{
		$db = $this->dbConnect();

		$req = $db->prepare('UPDATE comment SET comment = ? WHERE id = ?');
		$req->execute(array($comment, $commentId));

		return $req;
	}
}