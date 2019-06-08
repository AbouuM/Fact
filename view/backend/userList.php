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
      <title>Utilisateurs(Administrateur)</title>
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
      <link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet"> <!-- For h1 -->




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
          <li class="active"><a href="index.php?admin=usersList" class="smoothscroll">Les Utilisateurs</a></li>
          <li><a href="index.php?admin=postslist" class="smoothscroll">Les Articles</a></li>
          <li><a href="index.php?admin=commentslist" class="smoothscroll">Les Commentaires</a></li>
          <li><a href="index.php?admin=mailslist" class="smoothscroll">Mail</a></li>
          <li><a href="index.php?action=destroy" class="smoothscroll">Deconnexion</a></li>
        </ul>
      </div>
    </div>
  </div>



    



      <div class="container">
        <div class="row centered mt mb">
          <div class="h1_users">
            <h1>Liste des Utilisateurs inscrits sur le site</h1>
          </div>

          <div class="row centered mt mb">
       

         <table class="table">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Nom</th>
            <th scope="col">Prenom</th>
            <th scope="col">Pseudo</th>
            <th scope="col">Date de naissance</th>
            <th scope="col">Email</th>
            <th scope="col">Telephone</th>
            <th scope="col">Date inscription</th>
            <th scope="col">Statut</th>
          </tr>
        </thead>
        <tbody>


           <?php

             while($data = $users->fetch())
              {
                ?>
          <tr>
            <th scope="row"><?= htmlspecialchars($data['id']) ?></th>
            <td><a href="index.php?admin=account&id=<?= htmlspecialchars($data['id']) ?>"><?= htmlspecialchars($data['name']) ?></a></td>
            <td><?= htmlspecialchars($data['f_name']) ?></td>
            <td><?= htmlspecialchars($data['alias']) ?></td>
            <td><?= htmlspecialchars($data['date_naissance']) ?></td>
            <td><?= htmlspecialchars($data['email']) ?></td>
            <td><?= htmlspecialchars($data['phone']) ?></td>
            <td><?= htmlspecialchars($data['date_enregistrer']) ?></td>
            <td>
              <form action="index.php?admin=updateUserStat&id=<?= htmlspecialchars($data['id']) ?>" method='POST'> 
                    <label for="statut"></label>
                      <select name = "statut">
                        <option value=""><?= htmlspecialchars($data['status']) ?></option>
                        <option value="En Attente">En Attente</option>
                        <option value="Inscrit">Inscrit</option>
                        <option value="Suspendu">Suspendu</option>
                      </select>
                      <input type="hidden" name="id" value="<?= htmlspecialchars($data['id']) ?>">
                  <td><button type="submit" class="btn btn-success">Validé</button></td>
                </form>
            </td>
               
          <?php
            
              }

          $users->closeCursor();

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
    echo 'Pour devenir Administrateur, un mot peut tout changer !';
    header('Refresh:1; url=index.php?listPost');
  }
}

else
{
	echo 'Vous n\'avez rien à faire ici';
  	header('Refresh:1; url=index.php?listPost');
}
?>
