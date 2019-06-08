<?php 
require __DIR__ . '/vendor/autoload.php';

 
require('controller/frontend.php');
require('controller/backend.php');

try
{
	if(isset($_GET['action']))
	{
		if($_GET['action'] == 'listPost')
		{
			listPost();
		}



		elseif($_GET['action'] == 'post')
		{
			if($_GET['id'] && $_GET['id'] > 0)
			{
				posts();
			}

			else
			{
				throw new Exception("Aucun identifiant de billet n'est envoyé !");
			}
		}



		elseif($_GET['action'] == 'addComment')
		{
			if($_GET['id'] && $_GET['id'] > 0 )
			{
				if(isset($_GET['id'], $_POST['author'], $_POST['comment']))
				{
					$trimmed_author = trim($_POST['author']);
					$trimmed_comment = trim($_POST['comment']);
					
					if(!empty($_GET['id']) && !empty($trimmed_author) && !empty($trimmed_comment))
					{
						addComment($_GET['id'], $trimmed_author, $trimmed_comment);
					}

					else
					{
						throw new Exception(" Les champs reçus sont vides !");
					}
					
				}

				else
				{
					throw new Exception("Les Champs ne sont respécté !");
				}
			}

			else
			{
				throw new Exception("L'ajout d'un commentaire n'est pas pour aujourd'hui");
			}
		}



		elseif($_GET['action'] == 'posts')
		{
			allposts();
		}

		elseif($_GET['action'] == 'connect')
		{
			connect();
		}

		elseif($_GET['action'] == 'register')
		{
			register();
		}

		elseif($_GET['action'] == 'contact')
		{
			contact();
		}

		elseif($_GET['action'] == 'about')
		{
			about();
		}


		elseif($_GET['action'] == 'login')
		{
			if(isset($_POST['alias'], $_POST['pass']))
			{
				login($_POST['alias'], $_POST['pass']);
			}

			else
			{
				throw new Exception("Une erreur à été détécté lors de votre identication !");
				
			}
		}



		elseif($_GET['action'] == 'signup')
		{
			if(isset($_POST['name'], $_POST['fname'], $_POST['alias'], $_POST['birthday'], $_POST['email'], $_POST['pass'], $_POST['phone']))
			{
				$trimmed_name = trim($_POST['name']);
				$trimmed_fname = trim($_POST['fname']);
				$trimmed_alias = trim($_POST['alias']);
				$trimmed_birthday = trim($_POST['birthday']);
				$trimmed_email = trim($_POST['email']);
				$trimmed_pass = trim($_POST['pass']);
				$trimmed_phone = trim($_POST['phone']);

				if(!empty($trimmed_name) && !empty($trimmed_fname) && !empty($trimmed_alias) && !empty($trimmed_birthday) && !empty($trimmed_email) && !empty($trimmed_pass) && !empty($trimmed_phone))
				{
					signup($trimmed_name, $trimmed_fname, $trimmed_alias, $trimmed_birthday, $trimmed_email, $trimmed_pass, $trimmed_phone);
				}

				else
				{
					throw new Exception("Les champs reçus sont vides, veuillez réessayer !");
				}
				
			}

			else
			{
				throw new Exception("Vos informations n'ont pas pu être enregister");
			}
		}


		elseif($_GET['action'] == 'write')
		{
			write();
		}

		elseif($_GET['action'] == 'addPost')
		{
			if(isset($_POST['alias'], $_POST['title'], $_POST['content'], $_POST['id_user']))
			{
				$trimmed_alias = trim($_POST['alias']);
				$trimmed_title = trim($_POST['title']);
				$trimmed_content = trim($_POST['content']);
				$trimmed_idUser = trim($_POST['id_user']);

				if(!empty($trimmed_alias) && !empty($trimmed_title) && !empty($trimmed_content) && !empty($trimmed_idUser))
				{
					addPost($trimmed_alias, $trimmed_title, $trimmed_content, $trimmed_idUser);
				}

				else
				{
					throw new Exception(" Les champs reçus sont vides, veuillez réessayer !");
				}

				
			}

			else
			{
				throw new Exception("Il y a une erreur sur l'ajout de vos informations !");
			}
		}

		elseif($_GET['action'] == 'clickCv')
		{
			clickCv();
		}

		elseif($_GET['action'] == 'myPosts')
		{
			if($_GET['id'] && $_GET['id'] > 0)
			{
				MyPosts($_GET['id']);
			}

			else
			{
				throw new Exception(" Aucun identifiant d'utilisateur n'as été envoyer !");
			}
		}

		elseif($_GET['action'] == 'selectedPost')
		{
			if($_GET['id'] && $_GET['id'] > 0)
			{
				SelectPost();
			}

			else
			{
				throw new Exception(" Aucun identifiant de billet n'est envoyé !");
			}
		}



		elseif($_GET['action'] == 'updatePost')
		{
			if(isset($_POST['title'], $_POST['content'], $_POST['postId'], $_POST['userId']))
			{
				$trimmed_title = trim($_POST['title']);
				$trimmed_content = trim($_POST['content']);

				if(!empty($trimmed_title) && !empty($trimmed_content))
				{
					updatePost($trimmed_title, $trimmed_content, $_POST['postId'], $_POST['userId']);
				}
				
				else
				{
					throw new Exception(" Les champs reçus sont vides, veuillez réessayer !");
				}
			}

			else
			{
				throw new Exception(" Les champs n'ont pas pu être envoyer !");
			}
		}

		elseif($_GET['action'] == 'deletePost')
		{
			if($_GET['id'] && $_GET['id'] > 0)
			{
				deletePost($_GET['id']);
			}

			else
			{
				throw new Exception(" L'identifiant du billet n'a pas été reçu !");
			}
		}






		elseif($_GET['action'] == 'destroy')
		{
			destroy();
		}



		else
		{
			echo "Cette page n'a pas encore été créer !";
			header('Refresh:1; url=index.php?action=listPost');
		}	
	}



	// Admin

	elseif(isset($_GET['admin']))
	{
		if($_GET['admin'] == 'adminHome')
		{
			home();
		}

		elseif($_GET['admin'] == 'usersList')
		{
			ListUser();
		}

		elseif($_GET['admin'] == 'postslist')
		{
			postsList();
		}

		elseif($_GET['admin'] == 'commentslist') 
		{
			commentList();
		}

		elseif($_GET['admin'] == 'mailslist')
		{
			mailslist();
		}

		elseif($_GET['admin'] == 'updateCommentStat')
		{
			if($_GET['id'] && $_GET['id'] > 0)
			{
				if(isset($_POST['id'], $_POST['statut']))
				{
					updateStatut($_POST['id'], $_POST['statut']);
				}

				else
				{
					throw new Exception(" un des champs n'a pas été reçu !");
					
				}
			}
			else
			{
				throw new Exception(" Aucun identifiant de commentaire est envoyé !");
				
			}
		}

		elseif($_GET['admin'] == 'updateUserStat')
		{
			if($_GET['id'] && $_GET['id'] > 0)
			{
				if(isset($_POST['id'], $_POST['statut']))
				{
					updateUser($_POST['id'], $_POST['statut']);
				}

				else
				{
					throw new Exception(" un des champs n'a pas été reçu !");
				}
			}

			else
			{
				throw new Exception(" Aucun identifiant d'utilisateur n'a été envoyé !");
			}
		}

		elseif($_GET['admin'] == 'account')
		{
			if($_GET['id'] && $_GET['id'] > 0)
			{
				account();
			}

			else
			{
				throw new Exception(" Aucun identifiant d'utilisateur n'est envoyer !");
				
			}
		}

		elseif($_GET['admin'] == 'post')
		{
			if($_GET['id'] && $_GET['id'] > 0)
			{
				post();
			}

			else
			{
				throw new Exception(" Aucun identifiant de billet n'a été envoyer !");
				
			}
		}

		elseif($_GET['admin'] == 'adminComment')
		{
			if($_GET['id'] && $_GET['id'] > 0)
			{
				if(isset($_GET['id'], $_POST['author'], $_POST['comment']))
				{
					$trimmed_author = trim($_POST['author']);
					$trimmed_comment = trim($_POST['comment']);

					if(!empty($trimmed_author) && !empty($trimmed_comment))
					{
						adminComment($_GET['id'], $trimmed_author, $trimmed_comment);
					}
					
					else
					{
						throw new Exception(" Les champs reçus sont vides, veuillez réessayer !");	
					}
				}
				else
				{
					throw new Exception(" Une erreur à été détécté au niveau des champs !");
				}
			}
			else
			{
				throw new Exception(" Aucun identifiant du post n'a été envoyer !");
				
			}
		}

		elseif($_GET['admin'] == 'selectComment')
		{
			if($_GET['id'] && $_GET['id'] > 0)
			{
				selectComment();
			}
			else
			{
				throw new Exception(" Aucun identifiant de commentaire n'a été envoyer !");
			}
		}

		elseif($_GET['admin'] == 'updateComment')
		{
			if(isset($_POST['id'], $_POST['comment'], $_POST['postId']))
			{
				$trimmed_comment = trim($_POST['comment']);

				if(!empty($trimmed_comment))
				{
					updateComment($_POST['id'], $trimmed_comment, $_POST['postId']);
				}
				
				else
				{
					throw new Exception(" Les champs reçus sont vides, veuillez réessayer !");
				}
			}

			else
			{
				throw new Exception(" Un probleme au niveau des champs !");
			}
		}

		elseif($_GET['admin'] == 'receiptMail')
		{
			if(isset($_POST['name'], $_POST['email'], $_POST['subject'],$_POST['message']))
			{
				$trimmed_name = trim($_POST['name']);
				$trimmed_email = trim($_POST['email']);
				$trimmed_subject = trim($_POST['subject']);
				$trimmed_message = trim($_POST['message']);

				if(!empty($trimmed_name) && !empty($trimmed_email) && !empty($trimmed_subject) && !empty($trimmed_message))
				{
					receiptMail($trimmed_name, $trimmed_email, $trimmed_subject, $trimmed_message);
				}
				
				else
				{
					throw new Exception(" Les champs reçus sont vides, veuillez réessayer !");
				}
			}

			else
			{
				throw new Exception(" Un des champs n'a pas été reçu !");
			}
		}


		else
		{
			throw new Exception("Cette page n'a pas encore été créer !");
		}
	}

	


	else
	{
		listPost();
	}
}

catch(Exception $e)
{
	die('Erreur :'.$e->getMessage()); 
}