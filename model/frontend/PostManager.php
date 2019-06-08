<?php 

require_once('model/Manager.php');


class PostManager extends Manager
{
	public function getPosts()
	{
		$dbase = $this->dbConnect();
		$req = $dbase->query('SELECT id, author, title, content, date_format(creation_date, \'%d/%m/%Y\') AS date_publication FROM posts WHERE status = \'publié\' ORDER BY id DESC LIMIT 0,6');

		return $req;
	}

	public function getPost($postId)
	{
		$dbase = $this->dbConnect();
		$req = $dbase->prepare('SELECT id, author, title, content, date_format(creation_date, \'%d/%m/%Y\') AS date_publication FROM posts WHERE id = ?');
		$req->execute(array($postId));
		$post = $req->fetch();

		return $post;
	}

	public function getallPosts()
	{
		$dbase = $this->dbConnect();
		$req = $dbase->query('SELECT id, author, title, content, date_format(creation_date, \'%d/%m/%Y\') AS date_publication FROM posts WHERE status = \'publié\' ORDER BY id DESC');

		return $req;
	}

	public function addPost($alias, $title, $content, $userId)
	{
		$dbase = $this->dbConnect();
		$req = $dbase->prepare('INSERT INTO posts(author_id, author, title, content, creation_date, modification_date) VALUES(?, ?, ?, ?, NOW(), NOW())');
		$req->execute(array($userId, $alias, $title, $content)); 

		return $req;
	}

	public function postAdmin()
	{
		$dbase = $this->dbConnect();
		$req = $dbase->query('SELECT id, author_id, title, date_format(modification_date, \'%d/%m/%Y\') AS date_modification FROM posts ORDER BY id DESC LIMIT 0,6');

		return $req;
	}

	public function getListPost()
	{
		$dbase = $this->dbConnect();
		$req = $dbase->query('SELECT id, author, title, content, date_format(creation_date, \'%d/%m/%Y\') AS date_publication FROM posts ORDER BY id DESC');

		return $req;
	}

	public function count($authorId)
	{
		$dbase = $this->dbConnect();

		$req = $dbase->prepare('SELECT COUNT(*) AS nbrepost FROM posts WHERE author_id = ?');
		$req->execute(array($authorId));
		$post = $req->fetch();

		return $post;
	}

	public function userPost($userId)
	{
		$dbase = $this->dbConnect();

		$req = $dbase->prepare('SELECT id, author, title, date_format(modification_date, \'%d/%m/%Y à %Hh%i\') AS date_modification FROM posts WHERE author_id = ? AND status = \'publié\' ');
		$req->execute(array($userId));

		return $req;
	}

	public function postSelect($postId)
	{
		$dbase = $this->dbConnect();

		$req = $dbase->prepare('SELECT id, author_id, author, title, content FROM posts WHERE id = ?');
		$req->execute(array($postId));

		$post = $req->fetch();

		return $post;
	}

	public function upPost($title, $content, $postId)
	{
		$dbase = $this->dbConnect();

		$req = $dbase->prepare('UPDATE posts SET title = ?, content = ?, modification_date = NOW() WHERE id = ?;');
		$req->execute(array($title, $content, $postId));

		return $req;
	}

	public function delete($postId)
	{
		$dbase = $this->dbConnect();

		$req = $dbase->prepare('UPDATE posts SET status = \'suspendu\' WHERE id = ?');
		$req->execute(array($postId));

		return $req;
	}
}