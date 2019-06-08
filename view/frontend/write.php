<?php 

if(isset($_SESSION['id']))
{
  ?>

  <!DOCTYPE html>
  <html lang="fr">
    <head>
      <meta charset="utf-8">
      <title>Ecrire un Article</title>
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
            <a class="navbar-brand" href="index.php?action=listPost">Accueil</a>
          </div>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="index.php?action=posts" class="smoothscroll">Blogs Posts</a></li>
              <li><a href="index.php?action=about">À Propos</a></li>
              <li><a href="index.php?action=contact" class="smoothscroll">Contact</a></li>
              <li class="active"><a href="index.php?action=write" class="smoothscroll">Ecrire un article</a></li>
              <li><a href="" class="smoothscroll"></a></li>
              <li><a href="" class="smoothscroll"><?= $_SESSION['prenom'] ?></a></li>
              <li><a href="index.php?action=destroy" class="smoothscroll">Deconnexion</a></li>
            </ul>
          </div>
        </div>
      </div>

  <div id="workwrap">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
          <h1>Ajouter Un Blog Post</h1>
        </div>
      </div>
    </div>
  </div>

<div id="contact">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <h2 class="centered">Remplissez les informations vous concernant et régalez nous.</h2>

          <form class="contact-form php-mail-form" role="form" action="index.php?action=addPost" method="POST">

            Pseudo :
            <div class="form-group">
              <input type="alias" name="name" disabled class="form-control" value="<?php echo $_SESSION['pseudo'];?>">
              <div class="validate"></div>
            </div>

            <input type="hidden" name="alias" value="<?php echo $_SESSION['pseudo'];?>">

            Titre :
            <div class="form-group">
              <input type="text" name="title" class="form-control" placeholder="Le Titre de votre post" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
              <div class="validate"></div>
            </div>

            Contenu :
            <div class="form-group">
              <textarea class="form-control" name="content" placeholder="Votre Post" rows="5" data-rule="required" data-msg="Please write something for us" required></textarea>
              <div class="validate"></div>
            </div>

            <input type="hidden" name="id_user" value="<?php echo $_SESSION['id'];?>">

            <div class="loading"></div>
            <div class="error-message"></div>
            <div class="sent-message">Votre message à été envoyer. Merci !</div>

            <div class="form-send">
              <button type="submit" class="btn btn-large">Publier</button>
            </div>

          </form>





    




  </body>

</html>

<?php
}

else
{
  echo "Vous n'avez rien a faire ici !";
  header('Refresh:1; url=index.php?listPost');
}

