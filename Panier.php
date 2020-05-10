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
              if($_SESSION['username'] !== ""){
                  $user = $_SESSION['username'];
                  // afficher un message
                  echo "Bonjour $user, vous êtes connecté";
              }
           ?>
           </h2>
    </center>
</div>


<div>
    <center>
        <h2><b>PANIER</b></h2>
    </center>

</div>

<!-- Panier -->
<div id="panier">
    <center>
        <br>
        <h2>Vans Old School bordeaux</h2>
        <br>
        <h2>Vans Slip On noir</h2>
        <br>
        <h2>Nike Air blanc</h2>
        <br>
        <br>
        <h2>PAYER:</h2>
        <a href="https://www.paypal.com/fr/home%22%3E">
            <img src="paypal.png" alt="Paypal" style="width:40px;height:40px;border:0"></a>
    </center>
</div>



<!-- Nom et prénom des devs -->
<div id="IsaTim">
    <center><h4>Site crée par:<br>
        Isabella Bacalao<br>
        Timothée Riou
    </h4></center>
</div>

</body>

</html>