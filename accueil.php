<?php include('fonction.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
</head>
<body>
<?php include('head.php');?>
<div class="row" style="display: inline-block;">

              <div class="animated flipInY col-lg-4 col-md-3 col-sm-4 ">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-comments-o"></i></div>
                  <div class="count"><?php echo nb_etudiant(); ?></div>
                  <h3>Nombre des étudiants</h3>
                </div>
              </div>
              <div class="animated flipInY col-lg-4 col-md-3 col-sm-6 ">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-sort-amount-desc"></i></div>
                  <div class="count"><?php echo nb_ordinateur(); ?></div>
                  <h3>Nombre des ordinateurs</h3>
                </div>
              </div>
              <div class="animated flipInY col-lg-4 col-md-3 col-sm-6 ">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-check-square-o"></i></div>
                  <div class="count"><?php echo nb_utilisateur(); ?></div>
                  <h3>Nombre des utilisateurs</h3>
                </div>
              </div>
            </div>
          </div>
<?php include('foot.php');?>
</body>
</html>