<?php
session_start();

require_once 'model/frontend/PostManager.php';
require_once 'model/frontend/CommentManager.php';


function listPost()
{
	$postManager = new PostManager();
	$posts = $postManager->getPosts();

	require 'view/frontend/home.php';
}



function posts()
{
	$postManager = new PostManager();
	$commentManager = new CommentManager();

	$post = $postManager->getPost($_GET['id']);
	$comments = $commentManager->getComment($_GET['id']);

	require 'view/frontend/postView.php';
}



function addComment($postId, $author, $comment)
{
	$commentManager = new CommentManager();
	$affectedLines = $commentManager->addComments($postId, $author, $comment);

	if($affectedLines === false)
	{
		throw new Exception("Votre commentaire n'a pas pu être ajouté !");
	}

	else
	{
		header('Location: index.php?action=post&id='.$postId);
	}
}



function allposts()
{
	$postManager = new PostManager();
	$posts = $postManager->getallPosts();

	require 'view/frontend/posts.php';
}



function connect()
{
	require 'view/frontend/login.php';
}

function register()
{
	require 'view/frontend/register.php';
}

function contact()
{
	require 'view/frontend/contact.php';
}

function about()
{
	require 'view/frontend/about.php';
}

function clickCv()
{
	require 'public/doc/CV.pdf';
}

function MyPosts($userId)
{
	$postManager = new PostManager();
	$postUser = $postManager->userPost($userId);

	if($_SESSION['id'] == $userId)
	{
		require 'view/frontend/userPosts.php';
	}

	else
	{
		throw new Exception(" Vous n'avez pas accès à cette page !");
	}

	
}

function SelectPost()
{
	$postManager = new PostManager();
	$commentManager = new CommentManager();

	$selectedPost = $postManager->postSelect($_GET['id']);

	require 'view/frontend/updatePost.php';
}

function updatePost($title, $content, $postId, $userId)
{
	$postManager = new PostManager();

	$postChange = $postManager->upPost($title, $content, $postId);

	if($postChange === false)
	{
		throw new Exception(" Votre post n'a pas pu être modifier !");
	}

	else
	{
		echo 'Votre post à bien pu être modifier !';
		header('Refresh:1; url=index.php?action=myPosts&id='.$userId);
	}

}

function deletePost($postId)
{
	$postManager = new PostManager();

	$deletePost = $postManager->delete($postId);

	if($deletePost === false)
	{
		throw new Exception(" Votre post n'est pas ecnore supprimer, ressayer plus tard !");
	}

	else
	{
		echo " Votre post a bien été supprimé !";
		header('Refresh:2; url=index.php?action=listPost');
	}

}
