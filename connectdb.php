<?php
try
{
$bdd= new PDO('mysql:host=localhost;dbname=gl3db','root','');
}catch(Exception $e)
{
    die('Erreur:' .$e->getMessage());
}
?>
