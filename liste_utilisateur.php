<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include ('connectbd.php');
if(isset($_GET['ids'])){
    $bdd ->query('delete from utilisateur where idu='.$_GET['ids']);
    header('Location: liste_utilisateur.php');
}

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Liste Utilisateur</title>
    </head>
    <body>
        <?php include('head.php');?>
      <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
            <thead>
            <tr>
                <th>Idu</th>
                <th>Nom</th>
                <th>Login</th>
                <th>Password</th>
                <th>Profil</th>
                <th>Action</th>
               
            </tr>
            </thead>
             <tbody>
            <?php
     $req = $bdd->query('select * from utilisateur');
     foreach ($req as $cle => $value) {
         echo '<tr>';
         echo '<td>'. $value['idu'].'</td>';
         echo '<td>'. $value['nom'].'</td>';
         echo '<td>'. $value['login'].'</td>';
         echo '<td>'. $value['password'].'</td>';
         echo '<td>'. $value['profil'].'</td>';
       //  echo '<td> </td>';
         echo '<td>
             <a href="liste_utilisateur.php?ids='.$value['idu'].'">Supprimer</a>
<a href="utilisateur_form.php?idm='.$value['idu'].'">Editer</a>
</td';         
echo '</tr>';
         
     }
        ?>
                  </tbody>
        </table>   

        <?php include('foot.php');?>
    </body>
</html>
