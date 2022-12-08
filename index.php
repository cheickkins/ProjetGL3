<?php
//Ouverture d'une session
session_start();
include('connectbd.php');
if(isset($_POST['connexion'])){
    $req=$bdd->query('select * from utilisateur where login="'.$_POST['login'].'"and password="'.$_POST['password'].'"');
    if ($ligne=$req->fetch()){
      $_SESSION['nom']=$ligne['nom'];
        header('Location:accueil.php');
    }else{
        echo'Login ou Password incorrect';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella Alela! | </title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="index.php" method="Post">
              <h1>Authentification </h1>
              <div>
                <input type="text" class="form-control" placeholder="Login"name="login" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Mot de passe" name="password" required="" />
              </div>
              <div>
                <button class="btn btn-default submit" name="connexion">connexion</button>
                <a class="reset_pass" href="#">Mot de passe oublié</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
               

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Genie Logiciel !</h1>
                  <p>2022 TECH-ISTA tous droits réservés</p>
                </div>
              </div>
            </form>
          </section>
      </div>
    </div>
  </body>
</html>
