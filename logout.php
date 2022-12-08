<?php
session_start();
//destruction des variables de session
session_unset();
//Fermeture de la session
session_destroy();
//redirection sur l'index
header('Location:index.php');
?>