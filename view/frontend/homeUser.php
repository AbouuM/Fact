<?php 
session_start();
?>

<!DOCTYPE html>
  <html lang="fr">
    <head>
      <meta charset="utf-8">
      <title>Bienvenue sur mon Blog</title>
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
            <a class="navbar-brand" href="">Accueil</a>
          </div>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="index.php?action=posts" class="smoothscroll">Blogs Posts</a></li>
              <li><a href="index.php?action=about">À Propos</a></li>
              <li><a href="index.php?action=contact" class="smoothscroll">Contact</a></li>
              <li><a href="" class="smoothscroll">Ecrire un article</a></li>
              <li><a href="" class="smoothscroll"></a></li>
              <li><a href="" class="smoothscroll"><?= $_SESSION['prenom'] ?></a></li>
              <li><a href="" class="smoothscroll">Deconnexion</a></li>
            </ul>
          </div>
        </div>
      </div>


      <div id="headerwrap">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
              <div class="name">
                <h4>BONJOUR À TOUS, MON NOM EST</h4>
                <h1>MAHAMOUDA ABOUBACAR</h1>
                <h4>DEVELLOPEUR WEB</h4>
                <h4>Bienvenue</h4>
                <button type="button" class="btn btn-primary">Acceder au CV</button>
              </div>
            </div>
          </div>
        </div>
      </div>




      <!-- Les Blogs Posts -->
        <section id="works"></section>
        <div class="container">
          <div class="row centered mt mb">
            <h1>Les Blogs Posts</h1>

            <?php 

            while($data = $posts->fetch())
            {
              ?>
              <div class="col-lg-6 col-md-4 col-sm-4 gallery">
              <h3><?= htmlspecialchars($data['title']) ?></h3>
              <a href="index.php?action=post&id=<?= htmlspecialchars($data['id']) ?>"><img src="public/img/portfolio/folio01.png" class="img-responsive"></a>
              derniere modification le <?= htmlspecialchars($data['date_publication']) ?>
            </div>

            <?php 

            }

            $posts->closeCursor();

            ?>

            

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
