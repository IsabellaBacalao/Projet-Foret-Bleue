<?php

    $db_username = 'root';
    $db_password = 'root';
    $db_name     = 'foret_bleue';
    $db_host     = 'localhost';
    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
           or die('could not connect to database');

session_start();
if(isset($_POST['username']) && isset($_POST['password']))
{

    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $username = mysqli_real_escape_string($db,htmlspecialchars($_POST['username']));
    $password = mysqli_real_escape_string($db,htmlspecialchars($_POST['password']));

    if($username !== "" && $password !== "")
    {
        $requete = "SELECT count(*) FROM utilisateur where
              nom_utilisateur = '".$username."' and motdepasse = '".$password."' ";
        $exec_requete = mysqli_query($db,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $count = $reponse['count(*)'];
        if($count!=0) // nom d'utilisateur et mot de passe correctes
        {
           $_SESSION['username'] = $username;
           header('Location: Panier.php');
        }
        else
        {
           header('Location: Compte.php?erreur=1'); // utilisateur ou mot de passe incorrect
        }
    }
    else
    {
       header('Location: Compte.php?erreur=2'); // utilisateur ou mot de passe vide
    }
}
else
{
   header('Location: Compte.php');
}
mysqli_close($db); // fermer la connexion
?>