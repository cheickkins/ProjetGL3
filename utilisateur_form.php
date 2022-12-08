<?php
// connexion a la base de donnée
include('connectbd.php');
// insertion dans la table etudiant
if(isset($_POST['enregistrer'])){
    $req=$bdd->prepare('insert into utilisateur(nom,login,password,profil) values(?,?,?,?)');
    $req->bindValue(1,$_POST['nom']);
    $req->bindValue(2,$_POST['login']);
    $req->bindValue(3,$_POST['password']);
    $req->bindValue(4,$_POST['profil']);
    $req->execute();
    //redirection
    header('Location:liste_utilisateur.php');
}
// editer
if(isset($_GET['idm'])){
    $req= $bdd->query('select * from utilisateur where idu='.$_GET['idm']);
    foreach($req as $v){
        $_POST['idu']=$v['idu'];
        $_POST['nom']=$v['nom'];
        $_POST['login']=$v['login'];
        $_POST['password']=$v['password'];
        $_POST['profil']=$v['profil'];
    }
}
// modifier
if(isset($_POST['modifier'])){
    $req=$bdd->prepare('update utilisateur set nom=?,login=?,password=?,profil=? where idu=?');
    $req->bindValue(1,$_POST['nom']);
    $req->bindValue(2,$_POST['login']);
    $req->bindValue(3,$_POST['password']);
    $req->bindValue(4,$_POST['profil']);
    $req->bindValue(5,$_POST['idu']);
    $req->execute();
    //redirection
    header('Location:liste_utilisateur.php');
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
include ('head.php');
 ?>
<fieldset>
    <legend>Gestion des utilisateurs</legend>
    <form action="utilisateur_form.php" method="post">
    <div id="sp">
        <label for="">nom</label>
        <input type="text" name="nom" value="<?php if(isset($_POST['nom'])) echo $_POST['nom']; ?>" size="30"/> 
    </div>
    <div id="sp">
        <label for="">login</label>
        <input type="text" name="login" value="<?php if(isset($_POST['login'])) echo $_POST['login']; ?>" size="30"/> 
    </div>
    <div id="sp">
        <label for="">password</label>
        
        <input type="password" name="password" value="<?php if(isset($_POST['password'])) echo $_POST['password']; ?>" size="30"/> 
    </div>
    <div id="sp">
        <label for="">Profil</label>
        <input type="text" name="profil" value="<?php if(isset($_POST['profil'])) echo $_POST['profil']; ?>" size="30"/> 
        
    </div>
    <div id="sp">
                <label><input type="hidden" name="idu" value="<?php if(isset($_POST['idu'])) echo $_POST['idu']; ?>" size="30"/></label>
                <?php 
                if(isset($_GET['idm'])){
                ?>
                <input type="submit" name="modifier" value="Modifier"/>
                <?php }else{ ?>
                <input type="submit" name="enregistrer" value="Enregistrer" />
                <?php } ?>
            </div>
            <?php
include ('foot.php');
 ?>
    </form>
</fieldset>
</body>
</html>