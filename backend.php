<?php

$conn = new PDO('mysql:host=localhost;dbname=foret_bleue', 'root', 'root');

$code_produit = "";
$nom_produit = "";
$prix = "";
$taille = "";
$quantité = "";

$action= (isset ($_POST["action"])) ? $_POST["action"] : "";

?>




