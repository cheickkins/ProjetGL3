<?php
// connexion a la base de donnée
include('connectbd.php');
// insertion dans la table etudiant
if(isset($_POST['enregistrer'])){
    $req=$bdd->prepare('insert into etudiant(nom,telephone,classe) values(?,?,?)');
    $req->bindValue(1,$_POST['nom']);
    $req->bindValue(2,$_POST['telephone']);
    $req->bindValue(3,$_POST['classe']);
    $req->execute();
    //redirection
    header('Location:liste_etudiant.php');
}
// editer
if(isset($_GET['idm'])){
    $req= $bdd->query('select * from etudiant where ide='.$_GET['idm']);
    foreach($req as $v){
        $_POST['ide']=$v['ide'];
        $_POST['nom']=$v['nom'];
        $_POST['telephone']=$v['telephone'];
        $_POST['classe']=$v['classe'];
    }
}
// modifier
if(isset($_POST['modifier'])){
    $req=$bdd->prepare('update etudiant set nom=?,telephone=?,classe=? where ide=?');
    $req->bindValue(1,$_POST['nom']);
    $req->bindValue(2,$_POST['telephone']);
    $req->bindValue(3,$_POST['classe']);
    $req->bindValue(4,$_POST['ide']);
    $req->execute();
    //redirection
    header('Location:liste_etudiant.php');
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etudiant</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
<?php
include ('head.php');
 ?>
    <fieldset>
        <legend>Gestion des Etudiants</legend>
        <form action="etudiant_form.php" method="post">    
            <div id="sp">
                <label>nom</label>
                <input type="text" name="nom" value= "<?php if(isset($_POST['nom'])) echo $_POST['nom']; ?>" size="30" require/>
            </div>
            <div id="sp">
                <label>Telephone</label>
                <input type="text" name="telephone" value="<?php if(isset($_POST['telephone'])) echo $_POST['telephone'];?>" size="30"/>
            </div>
            <div id="sp">
                <label>Classe</label>
                <input type="text" name="classe" value="<?php if(isset($_POST['classe'])) echo $_POST['classe']; ?>" size="30"/>
            </div>
            <div id="sp">
                <label><input type="hidden" name="ide" value="<?php if(isset($_POST['ide'])) echo $_POST['ide']; ?>" size="30"/></label>
                <?php 
                if(isset($_GET['idm'])){
                ?>
                <input type="submit" name="modifier" value="Modifier"/>
                <?php }else{ ?>
                <input type="submit" name="enregistrer" value="Enregistrer" />
                <?php } ?>
            </div>

        </form>
    </fieldset>
    <?php
include ('foot.php');
 ?>
</body>
</html>