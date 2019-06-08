<?php 

if(isset($_SESSION['id']))
{
  if($_SESSION['statut'] == 'Administrateur')
  {
    ?>

    <!DOCTYPE html>
    <html lang="en">
      <head>
        <meta charset="utf-8">
        <title>Accueil(Administrateur)</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Favicons -->
        <link href="public/img/favicon.png" rel="icon">
        <link href="public/img/apple-touch-icon.png" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Happy+Monkey" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet"> <!-- For Navbar -->



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
                <li><a href="index.php?admin=commentslist" class="smoothscroll">Les Commentaires</a></li>
                <li><a href="index.php?admin=mailslist" class="smoothscroll">Mail</a></li>
                <li><a href="index.php?action=destroy" class="smoothscroll">Deconnexion</a></li>
              </ul>
            </div>
          </div>
        </div>

  

        <div id="headerwrap">
          <div class="container">
            <div class="row">
              <div class="col-lg-6 col-lg-offset-3">
                <div class="name">
                  <h4>BONJOUR</h4>
                  <h1><?= htmlspecialchars($_SESSION['prenom']) ?> <?= htmlspecialchars($_SESSION['nom']) ?></h1>
                  <button type="button" class="btn btn-light"><a href="index.php?listPost">Vue Utilisateur</a></button>
                </div>
              </div>
            </div>
          </div>
        </div>






        <!-- Les Utilisateurs -->
        <section id="works"></section>
        <div class="container">
          <div class="row centered mt mb">
            <h1>Les Derniers utilisateurs inscrits</h1>

        <?php 

        while($date_user = $users->fetch())
        {
          ?>

            <div class="col-lg-4 col-md-4 col-sm-4 gallery">
          <h3><?= htmlspecialchars($date_user['name']) ?></h3>
          <a href="index.php?admin=account&id=<?= htmlspecialchars($date_user['id']) ?>"><img src="public/img/portfolio/folio01.png" class="img-responsive"></a>
          Enregistrer le <?= htmlspecialchars($date_user['date_enregistrer']) ?>
          </div>

          <?php
        } 

        $users->closeCursor();

        ?>

        </div>
        </div>




      <!-- Les Blogs Posts -->
     
        <section id="works"></section>
        <div class="container">
          <div class="row centered mt mb">
            <h1>Les Blogs Posts</h1>

               
            <?php 
            
            while($data_posts = $posts->fetch())
            {
              ?>

                <div class="col-lg-6 col-md-4 col-sm-4 gallery">
              <h3><?= htmlspecialchars($data_posts['title']) ?></h3>
              <a href="index.php?admin=post&id=<?= htmlspecialchars($data_posts['id']) ?>"><img src="public/img/portfolio/folio01.png" class="img-responsive"></a>
              derniere modification le <?= htmlspecialchars($data_posts['date_modification']) ?>
              </div>

              <?php
            } 

            $posts->closeCursor();

            ?>
            
        </div>
            
        </div>
  

       <!-- Les Commentaires -->
        <section id="works"></section>
        <div class="container">
          <div class="row centered mt mb">
            <h1>Les Derniers commentaires publiés</h1>
            <div class="row centered mt mb">
         

           <table class="table">
          <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Auteur</th>
              <th scope="col">Commentaire</th>
              <th scope="col">Date du commentaire</th>
              <th scope="col">Statut</th>
            </tr>
          </thead>
          <tbody>

                <?php

                 while($data_comments = $comments->fetch())
                  {
                    ?>
              <tr>
                <th scope="row"><?= htmlspecialchars($data_comments['id']) ?></th> 
                <td><?= htmlspecialchars($data_comments['author']) ?></td>
                <td><?= htmlspecialchars($data_comments['comment']) ?></td>
                <td><?= htmlspecialchars($data_comments['date_commentaire']) ?></td>
                <td><?= htmlspecialchars($data_comments['statut']) ?></td>
                   
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
    echo "Je pense que pour devenir Administrateur, c'est mieux d'ecrire un petit mot gentil !";
    header('Refresh:2; url=index.php?listPost');
  } 
}
else
{
  echo 'Vous n\'avez rien à faire ici';
  header('Refresh:1; url=index.php?listPost');
}
?>

