<!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="utf-8">
      <title>S'inscire</title>
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

  <!-- Static navbar -->
  <div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
      </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="index.php?action=listPost">Accueil</a>
          <li><a href="index.php?action=connect" class="smoothscroll">Se Connecter</a></li>
        </ul>
      </div>
    </div>
  </div>


  <div id="contactwrap">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
          <h4>Pas encore Inscrit ?</h4>
          <h1>Alors c'est par ici !</h1>
        </div>
      </div>
    </div>
  </div>

  <div id="contact">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <h2 class="centered">Formulaire d'inscription</h2>

          <form class="contact-form php-mail-form" role="form" action="index.php?action=signup" method="POST">

            <div class="form-group">
              <input type="text" name="name" class="form-control" id="contact-name" placeholder="Votre Nom" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required>
              <div class="validate"></div>
            </div>
            <div class="form-group">
              <input type="text" name="fname" class="form-control" id="contact-fname" placeholder="Votre Prenom" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required>
              <div class="validate"></div>
            </div>
            <div class="form-group">
              <input type="text" name="alias" class="form-control" id="contact-alias" placeholder="Votre Pseudo" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required>
              <div class="validate"></div>
            </div>
            <div class="form-group">
              <input type="date" name="birthday" class="form-control" id="contact-birth" placeholder="Votre Date de naissance" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required>
              <div class="validate"></div>
            </div>
            <div class="form-group">
              <input type="email" name="email" class="form-control" id="contact-email" placeholder="Votre Email" data-rule="email" data-msg="Please enter a valid email" required>
              <div class="validate"></div>
            </div>
            <div class="form-group">
              <input type="password" name="pass" class="form-control" id="pass" placeholder="Votre mot de passe" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
              <div class="validate"></div>
            </div>
            <div class="form-group">
              <input type="text" name="phone" class="form-control" id="contact-phone" placeholder="Votre Telephone" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required>
              <div class="validate"></div>
            </div>


            

            <div class="loading"></div>
            <div class="error-message"></div>
            <div class="sent-message">Votre inscription à été prise en compte !</div>

            <div class="form-send">
              <button type="submit" class="btn btn-large">S'inscire</button>
            </div>

          </form>

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
