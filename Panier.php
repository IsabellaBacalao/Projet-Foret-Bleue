<?php

session_start();

include 'fonction_panier.php';

$erreur = false;

$action = (isset($_POST['accion'])? $_POST['accion']: null) ;

if($action !== null){

   if(!in_array($action,array('ajouterProduit', 'suppression', 'refresh')))
   $erreur=true;

    //récuperation des variables en POST
    $l = (isset($_POST['l'])? $_POST['l']: null);
    $p = (isset($_POST['p'])? $_POST['p']: null);
    $q = (isset($_POST['q'])? $_POST['q']: null);

     //Suppression des espaces verticaux
    $l = preg_replace('#\v#', '',$l);

    //On vérifie que $p soit un float
    $p = floatval($p);
    //On traite $q qui peut être un entier simple ou un tableau d'entiers

    if (is_array($q)){
          $quantité = array();
          $i=0;
          foreach ($q as $contenu){
             $quantité[$i++] = intval($contenu);
          }
    }
    else
    $q = intval($q);

}

if (!$erreur){
   switch($_POST['accion']){
      Case 'ajouterProduit' :
         ajouterProduit($l,$q,$p);

         break;

      Case "suppression":
         supprimerProduit($l);
         break;

      Case "refresh" :
         for ($i = 0 ; $i < count($quantité) ; $i++)
         {
            modifierQteProduit($_SESSION['panier']['libelleProduit'][$i],round($quantité[$i]));
         }
         break;

      Default:
         break;
   }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PANIER </title>
    <link rel="stylesheet" href="BS341/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Mr+Dafoe"/>
    <link href='https://fonts.googleapis.com/css?family=Allan' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Julius Sans One' rel='stylesheet'>

</head>
<body>
<!-- Bandeau jaune ou il y a le nom du site, la navbar et les icons -->
<div id="bandeau">
    <center>
        <h2>Boutique en ligne</h2>
        <h1>
            <a href="Acceuil.php">Forêt Bleue</a>
        </h1>

        <div id="icon">

            <a href="Compte.php">
                <img src="user.png" alt="Compte" style="width:20px;height:20px;border:0">
            </a>
            <a href="Panier.php">
                <img src="panier.png" alt="Panier" style="width:20px;height:20px;border:0">
            </a>
        </div>


    </center>
</div>

<div id="content">
    <center>
     <!-- tester si l utilisateur est connecté -->
     <h2>
         <?php
          if(isset($_GET['deconnexion']))
          {
             if($_GET['deconnexion']==true)
             {
                session_unset();
                header("location:Acceuil.php");
             }
          }
          else if((isset($_SESSION['username']) and ($_SESSION['username']!=""))){
              $user = $_SESSION['username'];
              // afficher un message
              echo "<br>Bonjour $user, vous êtes connectés<br/><br/>";
          }
           ?>
           <a href="deconnexion.php">Déconnexion</a>
           <br><br>
     </h2>
    </center>
</div>


<div id="panier">
    <center>
    <br>
    <h2><b>PANIER</b></h2>
    <br>
<?php if(!empty($_SESSION['panier'])) { ?>
    <form method="post" action="panier.php">
    <table style="width: 400px" class="table table-light table-bordered">

        <tr>
            <th width="40%">Libellé</th>
            <th width="40%">Quantité</th>
            <th width="40%">Prix Unitaire</th>
            <th width="40%">Action</th>
        </tr>

<?php } else {?>
<div class = "alert alert-success">
<?php
if (creationPanier()){
        $nbArticles = count($_SESSION['panier']['libelleProduit']);
        if ($nbArticles <= 0)
        echo "<tr><td>Votre panier est vide </ td></tr>";
        else
        {
            for ($i=0 ;$i < $nbArticles ; $i++)
            {
                echo "<tr>";
                echo "<td>".htmlspecialchars($_SESSION['panier']['libelleProduit'][$i])."</ td>";
                echo "<td><input type=\"text\" size=\"4\" name=\"q[]\" value=\"".htmlspecialchars($_SESSION['panier']['quantité'][$i])."\"/></td>";
                echo "<td>".htmlspecialchars($_SESSION['panier']['prix'][$i])."</td>";
                echo "<td><a href=\"".htmlspecialchars("Panier.php?action=suppression&l=".rawurlencode($_SESSION['panier']['libelleProduit'][$i]))."\">XX</a></td>";
                echo "</tr>";
            }

            echo "<tr><td colspan=\"2\"> </td>";
            echo "<td colspan=\"2\">";
            echo "Total : ".montantGlobal();
            echo "</td></tr>";

            echo "<tr><td colspan=\"4\">";
            echo "<input type=\"submit\" value=\"Rafraichir\"/>";
            echo "<input type=\"hidden\" name=\"action\" value=\"refresh\"/>";

            echo "</td></tr>";
        }
    }
?>
</div>
<?php } ?>
</table>
</form>

        <br>
        <h2>PAYER:</h2>
        <a href="https://www.paypal.com/fr/home%22%3E">
        <img src="paypal.png" alt="Paypal" style="width:40px;height:40px;border:0"></a>
</div>
</center>

<?php include 'footer.php';?>