<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require_once 'model/backend/UserManager.php';
require_once 'model/frontend/PostManager.php';
require_once 'model/frontend/CommentManager.php';
require_once 'model/backend/MailManager.php';


class BackendController
{
	public static function signup($name, $fname, $alias, $birthday, $email, $pass, $phone)
	{
		$userManager = new UserManager();
		
		$pass_hash = password_hash($pass, PASSWORD_DEFAULT);
		$user = $userManager->addUser($name, $fname, $alias, $birthday, $email, $pass_hash, $phone);

		if($user === false)
		{
			header('Location: index.php?action=error');
		}

		else
		{
			echo "Vos informations ont bien été enregister, votre compte va être examiner par l'administrateur, pour être validé !";
			header('Refresh:4; url=index.php?action=listPost');
		}
}

	public static function login($alias, $pass)
	{
		$userManager = new UserManager();


		$user = $userManager->getUser($alias, $pass);

		if($user === false)
		{
			echo " Identifiant ou mot de passe incorrect" ;
			header('Refresh:1; url=index.php?action=connect');
		}

		else
		{

			if($user['status'] == 'Administrateur')
			{
				session_start();
				$_SESSION['id'] = $user['id'];
				$_SESSION['nom'] = $user['name'];
				$_SESSION['prenom'] = $user['f_name'];
				$_SESSION['pseudo'] = $user['alias'];
				$_SESSION['mail'] = $user['email'];
				$_SESSION['phone'] = $user['phone'];
				$_SESSION['statut'] = true ;
				header('Location: index.php?admin=adminHome');
			}

			elseif($user['status'] == 'Attente')
			{
				echo 'Votre compte est en cours de validation !';
				header('Refresh:1; url=index.php?action=listPost');
			}

			else
			{
				session_start();
				$_SESSION['id'] = $user['id'];
				$_SESSION['nom'] = $user['name'];
				$_SESSION['prenom'] = $user['f_name'];
				$_SESSION['pseudo'] = $user['alias'];
				$_SESSION['mail'] = $user['email'];
				$_SESSION['phone'] = $user['phone'];
				$_SESSION['statut'] = $user['status'];
				header('Location: index.php?action=listPost');
			}
		}

	}



	public static function write()
	{
		require 'view/frontend/write.php';
	}



	public static function addPost($alias, $title, $content, $userId)
	{
		$postManager = new PostManager();
		$post = $postManager->addPost($alias, $title, $content, $userId);

		if($post === false)
		{
			echo " Votre Article n'as pas pu être créer !" ;
			header('Refresh:1; url=index.php?action=index.php?action=write');
		}

		else
		{
			echo "Félicitation votre article à bien été créer !";
			header('Refresh:1; url=index.php?action=listPost');
		}
	}



	public static function destroy()
	{
		session_start();

		$_SESSION = array();
		session_destroy();

		header('Location: index.php?action=listPost');
	}



	public static function error()
	{
		require 'view/backend/error.php';
	}



	// Admin 

	public static function home()
	{
		$userManager = new UserManager();
		$postManager = new PostManager();
		$commentManager = new CommentManager();


		$users = $userManager->Users();
		$posts = $postManager->postAdmin();
		$comments = $commentManager->getComments();

		require 'view/backend/adminView.php';
	}

	public static function ListUser()
	{
		$userManager = new UserManager();
		$users = $userManager->listUsers();

		require 'view/backend/userList.php';
	}

	public static function postsList()
	{
		$postManager = new PostManager();
		$posts = $postManager->getListPost();

		require 'view/backend/posts(admin).php';
	}

	public static function commentList()
	{
		$commentManager = new CommentManager();
		$comments = $commentManager->getListComment();

		require 'view/backend/commentList.php';
	}

	public static function mailslist()
	{
		$mailsManager = new MailManager();
		$mails = $mailsManager->getMails();

		require 'view/backend/mailList.php';
	}

	public static function updateStatut($commentId, $statut)
	{
		$commentManager = new CommentManager();

		$comment = $commentManager->updateStat($commentId, $statut);

		if($comment === false)
		{
			throw new Exception(" Le statut du commentaire n'a pas pu être mise à jour !");
		}

		else
		{
			echo "Le statut du commentaire à bien été mise à jour !";
			header('Refresh:2; url=index.php?admin=commentslist');
		}
	}

	public static function updateUser($userId, $statut)
	{
		$userManager = new UserManager();

		$user = $userManager->updateStat($userId, $statut);

		if($comment === false)
		{
			throw new Exception(" Le statut de l'utilisateur n'a pas pu être mise à jour !");
		}

		else
		{
			echo "Le statut de l'utilisateur à bien été mise à jour !";
			header('Refresh:2; url=index.php?admin=usersList');
		}
	}

	public static function account()
	{
		$userManager = new UserManager();
		$postManager = new PostManager();

		$user = $userManager->account($_GET['id']);
		$postCount = $postManager->count($_GET['id']);

		require 'view/backend/account.php';
	}

	public static function post()
	{
		$postManager = new PostManager();
		$commentManager = new CommentManager();

		$post = $postManager->getPost($_GET['id']);
		$comments = $commentManager->getComment($_GET['id']);

		require 'view/backend/postViewAdmin.php';
	}

	public static function adminComment($postId, $author, $comment)
	{
		$commentManager = new CommentManager();

		$addLines = $commentManager->adminComments($postId, $author, $comment);

		if($addLines === false)
		{
			throw new Exception(" Votre ajout de commentaire à échouer !");
		}

		else
		{
			header('Location: index.php?admin=post&id='.$postId);
		}
	}

	public static function selectComment()
	{
		$commentManager = new CommentManager();
		$comment = $commentManager->SelectComment($_GET['id']);

		require 'view/backend/updateComment.php';
	}

	public static function updateComment($commentId, $comment, $postId)
	{
		$commentManager = new CommentManager();
		$updateComment = $commentManager->upComment($commentId, $comment);

		if($updateComment === false)
		{
			throw new Exception(" Le commentaire n'a pas encore été modifier !");
		}

		else
		{
			echo "Le commentaire à bien été modifier !";
			header('Refresh:1; url=index.php?admin=post&id='.$postId);
		}

	}

	public static function receiptMail($name, $email, $subject, $message)
	{

	$MailManager = new MailManager();

	$mailReceipt = $MailManager->receipt($name, $email, $subject, $message);

	$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
	try
	{
	    //Server settings
	    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
	    $mail->isSMTP();                                      // Set mailer to use SMTP
	    $mail->Host = 'smtp.mailgun.org';  // Specify main and backup SMTP servers
	    $mail->SMTPAuth = true;                               // Enable SMTP authentication
	    $mail->Username = 'postmaster@sandbox79c527e0fa77407e8131fd67ed9be4cc.mailgun.org';                 // SMTP username
	    $mail->Password = 'dc251381453bd25e4f025a9af7ce674b-7caa9475-2c99d33e';                           // SMTP password
	    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	    $mail->Port = 587;                                    // TCP port to connect to

	    //Recipients
	    $mail->setFrom('postmaster@sandbox79c527e0fa77407e8131fd67ed9be4cc.mailgun.org', 'Blog PHP');
	    $mail->addAddress('mabouu21@gmail.com', 'Abou M');     // Add a recipient

	    //Content
	    $mail->isHTML(true);                                  // Set email format to HTML
	    $mail->Subject = $subject;
	    $mail->Body    = $message;
	    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

	    $mail->send();
	    echo 'Le Message est bien envoyer ';
	    header('Refresh:1; url=index.php?listPost');

	} 

	catch (Exception $e) 
	{
	    echo 'Le Message n\'est pas envoyer. Mailer Error: ', $mail->ErrorInfo;
	}


	}

}



