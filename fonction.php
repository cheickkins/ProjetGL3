<?php
function nb_etudiant(){
    include('connectbd.php');
    $nb=0;
    $req=$bdd->query('select count(*) as nbe from etudiant');
    if($ligne=$req->fetch()){
        $nb=$ligne['nbe'];
    }
    return $nb;
}


function nb_ordinateur(){
    include('connectbd.php');
    $nb1=0;
    $req=$bdd->query('select count(*) as nbe from ordinateur');
    if($ligne=$req->fetch()){
        $nb1=$ligne['nbe'];
    }
    return $nb1;
}

function nb_utilisateur(){
    include('connectbd.php');
    $nb2=0;
    $req=$bdd->query('select count(*) as nbe from utilisateur');
    if($ligne=$req->fetch()){
        $nb2=$ligne['nbe'];
    }
    return $nb2;
}
?>