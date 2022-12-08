<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include ('connectbd.php');
if(isset($_GET['ids'])){
    $bdd ->query('delete from ordinateur where ido='.$_GET['ids']);
    header('Location: liste_ordinateur.php');
}

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Liste Ordinateur</title>
    </head>
    <body>
        <?php include('head.php');?>
 <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
     <thead>   
            <tr>
                <th>Ido</th>
                <th>Marque</th>
                <th>Couleur</th>
                <th>Disque</th>
                <th>Ram</th>
                <th>Nom</th>
                <th>Date Achat</th>
                <th>Action</th>
            </tr>
             </thead>
             <tbody>
            <?php
    //select ord.ido, ord.marque,ord.couleur,ord.disque,ord.disque,ord.ram,ord.dateachat, et.nom,et.telephone from ordinateur ord, etudiant et where ord.ide = et.ide;
            //$req = $bdd->query('select * from ordinateur');
            $req = $bdd->query('select ord.ido, ord.marque,ord.couleur,ord.disque,ord.disque,ord.ram,ord.dateAchat, et.nom,et.telephone from ordinateur ord, etudiant et where ord.ide = et.ide');
     foreach ($req as $cle => $value) {
         echo '<tr>';
         echo '<td>'. $value['ido'].'</td>';
         echo '<td>'. $value['marque'].'</td>';
         echo '<td>'. $value['couleur'].'</td>';
         echo '<td>'. $value['disque'].'</td>';
         echo '<td>'. $value['ram'].'</td>';
         echo '<td>'. $value['nom'].'</td>';
         
//$re = $bdd ->query('select nom from etudiant where ide='.$value['ide']);
//foreach ($re as $v) {
    //echo '<td>'.$v['nom'].'</td>';
    
     //}
           echo '<td>'. $value['dateAchat'].'</td>';
        // echo '<td> </td>';
         echo '<td>
             <a href="liste_ordinateur.php?ids='.$value['ido'].'">Supprimer</a>
<a href="ordinateur_form.php?idm='.$value['ido'].'">Editer</a>
</td';         
echo '</tr>';
         
     }
        ?>
                  </tbody>
        </table>       
 <?php
        // put your code here
        ?>
        <?php include('foot.php');?>
    </body>
</html>
