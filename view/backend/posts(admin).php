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
      <title>Articles(Administrateur)</title>
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
          <li class="active"><a href="index.php?admin=postslist" class="smoothscroll">Les Articles</a></li>
          <li><a href="index.php?admin=commentslist" class="smoothscroll">Les Commentaires</a></li>
          <li><a href="index.php?admin=mailslist" class="smoothscroll">Mail</a></li>
          <li><a href="index.php?action=destroy" class="smoothscroll">Deconnexion</a></li>
        </ul>
      </div>
    </div>
  </div>

 

  <br>
  <br>

<?php

  while($data = $posts->fetch())
  {
    ?>
        
        <div class="col-lg-4 col-md-4 col-sm-4 gallery">
          <h4><?= htmlspecialchars($data['title'])  ?></h4>
          <a href="index.php?admin=post&id=<?= htmlspecialchars($data['id']) ?>"><img src="public/img/portfolio/folio01.png" class="img-responsive"></a>
            <p style='text-align: center;'>Publié le <?= htmlspecialchars($data['date_publication']) ?></p>
        </div>

        <?php
  }

  ?>  


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
    echo 'Pour devenir Administrateur, un petit mot, ça fait toujours plaisir !';
    header('Refresh:1; url=index.php?listPost');
  }	
}
else
{
	echo 'Vous n\'avez rien à faire ici';
  header('Refresh:1; url=index.php?listPost');
}

?>