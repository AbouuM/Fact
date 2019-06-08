<!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="utf-8">
      <title>Blog Post</title>
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <meta content="" name="keywords">
      <meta content="" name="description">

      <!-- Favicons -->
      <link href="public/img/favicon.png" rel="icon">
      <link href="public/img/apple-touch-icon.png" rel="apple-touch-icon">

      <!-- Google Fonts -->
      <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700"      rel="stylesheet">
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


      <?php 
      if(isset($_SESSION['id']))
      {
        ?>
        <div class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            <a class="navbar-brand" href="index.php?action=listPost">Accueil</a>
          </div>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="index.php?action=posts" class="smoothscroll">Blogs Posts</a></li>
              <li><a href="index.php?action=about">À Propos</a></li>
              <li><a href="index.php?action=contact" class="smoothscroll">Contact</a></li>
              <li><a href="index.php?action=write" class="smoothscroll">Ecrire un article</a></li>
              <li><a href="" class="smoothscroll"></a></li>
              <li><a href="" class="smoothscroll"><?= $_SESSION['prenom'] ?></a></li>
              <li><a href="index.php?action=destroy" class="smoothscroll">Deconnexion</a></li>
            </ul>
          </div>
        </div>
      </div>
      <?php
      }

      
      
      else
      {
        ?>

        <div class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            <a class="navbar-brand" href="index.php?action=listPost">Accueil</a>
          </div>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
              <li class="active"><a href="index.php?action=posts" class="smoothscroll">Blogs Posts</a></li>
              <li><a href="index.php?action=about">À Propos</a></li>
              <li><a href="index.php?action=contact" class="smoothscroll">Contact</a></li>
              <li><a href="" class="smoothscroll"></a></li>
              <li><a href="index.php?action=connect" class="smoothscroll">Inscritpion/Connexion</a></li>
            </ul>
          </div>
        </div>
      </div>
      <?php
      }
      ?>


      <div id="workwrap">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
              <h1><?= htmlspecialchars($post['title']) ?></h1>
              <h4>Auteur: <?= htmlspecialchars($post['author']) ?></h4>
              <h4>Publié le <?= $post['date_publication'] ?></h4>
            </div>
          </div>
        </div>
      </div>

  <section id="works"></section>
  <div class="container">
    <div class="row centered mt mb">
      <div class="col-lg-8 col-lg-offset-2">
        <h4>Resumé</h4>

        <p>
          <?= nl2br(htmlspecialchars($post['content'])) ?>
        </p>
      </div>
      <div class="col-lg-10 col-lg-offset-1 mt">
        <img class="img-responsive" src="public/img/pr01.jpg">
        <br>
      </div>



      <div class="col-lg-8 col-lg-offset-2">
        <h2>Commentaire</h2>

        <br><?php 
        while ($comment = $comments->fetch())
        {
          ?>
          <p><strong><?= htmlspecialchars($comment['author']) ?></strong>: le <?= $comment['comment_date_fr'] ?>:<br>
          <?= nl2br(htmlspecialchars($comment['comment'])) ?></p><br>
          <?php
        }
        ?>




        <!-- Send Comment -->

        <h2 class="centered">Envoyer un commentaire</h2>

          <form class="contact-form php-mail-form" role="form" action="index.php?action=addComment&id=<?=$post['id'] ?>" method="POST">

            <div class="form-group">
              <input type="text" name="author" class="form-control" id="author" placeholder="Votre Nom ou pseudo" data-rule="" data-msg="" >
              <div class="validate"></div>
            </div>

            <div class="form-group">
              <textarea class="form-control" name="comment" id="comment" placeholder="Votre commentaire" rows="5" data-rule="required" data-msg=""></textarea>
              <div class="validate"></div>
            </div>

            <div class="loading"></div>
            <div class="error-message"></div>
            <div class="sent-message">Votre message à été envoyer. Merci !</div>

            <div class="form-send">
              <button type="submit" class="btn btn-large">Envoyer</button>
            </div>

          </form>

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
  <script src="lib/easing/easing.min.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>

</body>
</html>
