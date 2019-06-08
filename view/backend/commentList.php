<?php 

if(isset($_SESSION['id']))
{
	if($_SESSION['statut'] == 'Administrateur')
	{
		?>

		<!DOCTYPE html>
  			<html lang="fr">
			    <head>
			      <meta charset="utf-8">
			      <title>Commentaires(Administrateur)</title>
			      <meta content="width=device-width, initial-scale=1.0" name="viewport">
			      <meta content="" name="keywords">
			      <meta content="" name="description">

			      <!-- Favicons -->
			      <link href="img/favicon.png" rel="icon">
			      <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

			      <!-- Google Fonts -->
			      <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700" rel="stylesheet">
			      <link href="https://fonts.googleapis.com/css?family=Happy+Monkey" rel="stylesheet">
			      <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet"> <!-- For Navbar -->
			      <link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet"> <!-- For h1 -->
			      <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet"> <!-- For comment -->





			      <!-- Bootstrap CSS File -->
			      <link href="public/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

			      <!-- Libraries CSS Files -->
			      <link href="public/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">

			      <!-- Main Stylesheet File -->
			      <link href="public/css/style.css" rel="stylesheet">

			      <!-- My css -->
			      <link href="public/styles.css" rel="stylesheet">

			    </head>

			    <body>

			      <div class="navbar navbar-default navbar-fixed-top" role="navigation">
				    <div class="container">
				      <div class="navbar-header">
				        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				            <span class="sr-only">Toggle navigation</span>
				            <span class="icon-bar"></span>
				            <span class="icon-bar"></span>
				            <span class="icon-bar"></span>
				          </button>
				        <a class="navbar-brand" href="index.php?admin=adminHome">Accueil</a>
				      </div>
				      <div class="navbar-collapse collapse">
				        <ul class="nav navbar-nav navbar-right">
				          <li><a href="index.php?admin=usersList" class="smoothscroll">Les Utilisateurs</a></li>
				          <li><a href="index.php?admin=postslist" class="smoothscroll">Les Articles</a></li>
				          <li class="active"><a href="index.php?admin=commentslist" class="smoothscroll">Les Commentaires</a></li>
				          <li><a href="index.php?admin=mailslist" class="smoothscroll">Mail</a></li>
				          <li><a href="index.php?action=destroy" class="smoothscroll">Deconnexion</a></li>
				        </ul>
				      </div>
				    </div>
				  </div>



    



		      <div class="container">
		        <div class="row centered mt mb">
		          <div class="h1_users">
		            <h1> Liste des commentaires</h1>
		          </div>

		          <div class="row centered mt mb">
		       

		         <table class="table">
		        <thead>
		          <tr>
		            <th scope="col">Id</th>
		            <th scope="col">Auteur</th>
		            <th scope="col">Contenu</th>
		            <th scope="col">Date d'ajout</th>
		            <th scope="col">Statut</th>
		          </tr>
		        </thead>
		        <tbody>


	           <?php

	             while($data = $comments->fetch())
	              {
	                ?>
	          <tr>
	            <div class="text_comment">
	              <th scope="row"><?= htmlspecialchars($data['id']) ?></th> <!-- Un tr designe une personne avec toute ses informations -->
	              <td><?= htmlspecialchars($data['author']) ?></td>
	              <td><?= htmlspecialchars($data['comment']) ?></td>
	              <td><?= htmlspecialchars($data['date_commentaire']) ?></td>
	              <td>
	              	<form action="index.php?admin=updateCommentStat&id=<?= htmlspecialchars($data['id']) ?>" method='POST'> 
	              		<label for="statut"></label>
	              			<select name = "statut">
	              				<option value=""><?= htmlspecialchars($data['statut']) ?></option>
	              				<option value="en attente">En Attente</option>
	              				<option value="publié">Publié</option>
	              			</select>
	              			<input type="hidden" name="id" value="<?= htmlspecialchars($data['id']) ?>">
	              	<td><button type="submit" class="btn btn-success">Validé</button></td>
	              </form>
	              		</div>
	            </div>
	               
	          <?php
	            
	              }

	          $comments->closeCursor();

	          ?>


	          </tr>
	        </tbody>
	      </table>
     

     

	    </div>
    </div> 
	</div>
    </div>
  </div>
  <div id="social">
          <div class="container">
            <div class="row centered">
              <div class="col-lg-2">
                <a href="#"><i class="fa fa-dribbble"></i></a>
              </div>
              <div class="col-lg-2">
                <a href="#"><i class="fa fa-facebook"></i></a>
              </div>
              <div class="col-lg-2">
                <a href="#"><i class="fa fa-twitter"></i></a>
              </div>
              <div class="col-lg-2">
                <a href="#"><i class="fa fa-linkedin"></i></a>
              </div>
              <div class="col-lg-2">
                <a href="#"><i class="fa fa-instagram"></i></a>
              </div>
              <div class="col-lg-2">
                <a href="#"><i class="fa fa-tumblr"></i></a>
              </div>

            </div>
          </div>
        </div>

        <div id="copyrights">
          <div class="container">
            <p>
              &copy; Copyrights <strong>Instant</strong>. All Rights Reserved
            </p>
            <div class="credits">
              Created with Instant template by <a href="https://templatemag.com/">TemplateMag</a>
            </div>
          </div>
        </div>
        <!-- / copyrights -->

        <!-- JavaScript Libraries -->
        <script src="lib/jquery/jquery.min.js"></script>
        <script src="lib/bootstrap/js/bootstrap.min.js"></script>
        <script src="lib/php-mail-form/validate.js"></script>

        <!-- Template Main Javascript File -->
        <script src="js/main.js"></script>

	  

	    </body>

	</html>





		<?php
	}
	else
	{
		echo "Un petit mot pour l'administrateur !";
		header('Refresh:2; url=index.php?listPost');
	}
}
else
{
	echo 'Vous n\'avez rien à faire ici';
  	header('Refresh:1; url=index.php?listPost');
}
