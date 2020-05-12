<?php

include 'backend.php';

$code_produit = "";
$nom_produit = "";
$prix = "";
$taille = "";
$quantité = "";

$sql = "select * from produit";
$res = $conn->query($sql);

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
          session_start();
          if(isset($_GET['deconnexion']))
          {
             if($_GET['deconnexion']==true)
             {
                session_unset();
                header("location:Acceuil.php");
             }
          }
          else if($_SESSION['username'] !== ""){
              $user = $_SESSION['username'];
              // afficher un message
              echo "<br>Bonjour $user, vous êtes connectés";
          }
           ?>
           <br><br>
           <a href="deconnexion.php">Déconnexion</a>
     </h2>
    </center>
</div>



<div>
    <center>
        <h2><b>PANIER</b></h2>
    </center>

</div>

<!-- Panier -->
<center>
<div id="panier">
    <table class="table table-bordered">
    <tr>
        <th>Code </th>
        <th>Produit </th>
        <th>Prix </th>
        <th>Taille </th>
        <th>Quantité </th>
        <th></th>
        <th></th>
        </tr>

        <tr>
        <form action="Panier.php" method="post">
            <input type="Hidden" name="Code" value="<?echo $code_produit;?>">
            <input type="Hidden" name="Nom" value="<?echo $nom_produit;?>">
            <input type="Hidden" name="Prix" value="<?echo $prix ;?>">
            <input type="Hidden" name="Taille" value="<?echo $taille;?>">
            <input type="Hidden" name="Quantite" value="<?echo $quantité;?>"><th></th>
            <input type="Submit" value="Ajouter au panier">
    </form>

</table>
        <br>
        <h2>PAYER:</h2>
        <a href="https://www.paypal.com/fr/home%22%3E">
        <img src="paypal.png" alt="Paypal" style="width:40px;height:40px;border:0"></a>
</div>
</center>


<!-- Nom et prénom des devs -->
<br><br>
<div id="IsaTim">
    <center><h4>Site crée par:<br>
        Isabella Bacalao<br>
        Timothée Riou
    </h4></center>
</div>

</body>

</html>