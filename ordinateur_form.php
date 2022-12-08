<?php
// connexion a la base de donnée
include('connectbd.php');
// insertion dans la table ordinateur
if(isset($_POST['enregistrer'])){
    $req=$bdd->prepare('insert into ordinateur(marque,couleur,disque,ram,ide,dateachat) values(?,?,?,?,?,?)');
    $req->bindValue(1,$_POST['marque']);
    $req->bindValue(2,$_POST['couleur']);
    $req->bindValue(3,$_POST['disque']);
    $req->bindValue(4,$_POST['ram']);
    $req->bindValue(5,$_POST['ide']);
    $req->bindValue(6,$_POST['dateachat']);
    $req->execute();
    //redirection
    header('Location:liste_ordinateur.php');
}
// editer
if(isset($_GET['idm'])){
    $req= $bdd->query('select * from ordinateur where ido='.$_GET['idm']);
    foreach($req as $v){
        $_POST['ido']=$v['ido'];
        $_POST['marque']=$v['marque'];
        $_POST['couleur']=$v['couleur'];
        $_POST['disque']=$v['disque'];
        $_POST['ram']=$v['ram'];
        $_POST['ide']=$v['ide'];
        $_POST['dateachat']=$v['dateachat'];
    }
}
// modifier
if(isset($_POST['modifier'])){
    $req=$bdd->prepare('update ordinateur set marque=?,couleur=?,disque=?,ram=?,ide=?,dateachat=? where ido=?');
    $req->bindValue(1,$_POST['marque']);
    $req->bindValue(2,$_POST['couleur']);
    $req->bindValue(3,$_POST['disque']);
    $req->bindValue(4,$_POST['ram']);
    $req->bindValue(5,$_POST['ide']);
    $req->bindValue(6,$_POST['dateachat']);
    $req->bindValue(7,$_POST['ido']);
    $req->execute();
    //redirection
    header('Location:liste_ordinateur.php');
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ordinateur</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
include ('head.php');
 ?>
    <fieldset>
        <legend>Gestion des ordinateurs</legend>
        <form action="ordinateur_form.php" method="post">
<div id="sp">
<label>marque</label>
                <input type="text" name="marque" value="<?php if(isset($_POST['marque'])) echo $_POST['marque']; ?>" size="30"/>
</div>
<div id="sp">
                <label>couleur</label>
                <input type="text" name="couleur" value="<?php if(isset($_POST['couleur'])) echo $_POST['couleur']; ?>" size="30"/>
            </div>
            <div id="sp">
                <label>disque</label>
                <input type="text" name="disque" value="<?php if(isset($_POST['disque'])) echo $_POST['disque']; ?>" size="30"/>
            </div>
            <div id="sp">
                <label>ram</label>
                <input type="text" name="ram" value="<?php if(isset($_POST['ram'])) echo $_POST['ram']; ?>" size="30"/>
            </div>
            <div id="sp">
                <label>etudiant</label>
                <select name="ide" id="">
                <?php
                $req=$bdd->query("select * from etudiant");
                foreach($req as $v){
                    echo '<option value="'.$v['ide'].'">'.$v['nom'].'</option>';
                }
                
                ?>  
                </select>>
            </div>
            
            <div id="sp">
                <label>dateachat</label>
                <input type="date" name="dateachat" value="<?php if(isset($_POST['dateachat'])) echo $_POST['dateachat']; ?>" size="30"/>
            </div>
            <div id="sp">
                <label><input type="hidden" name="ido" value="<?php if(isset($_POST['ido'])) echo $_POST['ido']; ?>" size="30"/></label>
                <?php 
                if(isset($_GET['idm'])){
                ?>
                <input type="submit" name="modifier" value="Modifier"/>
                <?php }else{ ?>
                <input type="submit" name="enregistrer" value="Enregistrer" />
                <?php } ?>
            </div>
            
        </form>
        <?php
include ('foot.php');
 ?>
    </fieldset>
</body>
</html>