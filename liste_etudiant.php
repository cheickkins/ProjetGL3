






<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include ('connectbd.php');
if(isset($_GET['ids'])){
    $bdd ->query('delete from etudiant where ide='.$_GET['ids']);
    header('Location: liste_etudiant.php');
}

?>



<html>
    <head>
        <meta charset="UTF-8">
        <title>Liste Etudiant</title>
    </head>
    <body>
        <?php include('head.php');?>
        <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
            <thead>   
                       <tr>
                <th>Ide</th>
                <th>Nom</th>
                <th>Telephone</th>
                <th>Classe</th>
                <th>Action</th>
            </tr>
             </thead>
             <tbody>
            <?php
     $req = $bdd->query('select * from etudiant');
     foreach ($req as $cle => $value) {
         echo '<tr>';
         echo '<td>'. $value['ide'].'</td>';
         echo '<td>'. $value['nom'].'</td>';
         echo '<td>'. $value['telephone'].'</td>';
         echo '<td>'. $value['classe'].'</td>';
       //  echo '<td> </td>';
         echo '<td>
             <a href="liste_etudiant.php?ids='.$value['ide'].'">Supprimer</a>
<a href="etudiant_form.php?idm='.$value['ide'].'">Editer</a>
</td';         
echo '</tr>';
         
     }
        ?>
             </tbody>
        </table>
        
        <?php include('foot.php');?>
    </body>
</html>
