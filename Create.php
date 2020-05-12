<?php
include 'backend.php';

$nom_utilisateur = "";
$motdepasse = "";
$prenom = "";
$nom = "";
$mail = "";

$action= (isset ($_POST["action"])) ? $_POST["action"] : "";


//Nouveau enregistrement

if($action == "NEW"){
    $nom_utilisateur = $_POST["username"];
    $motdepasse = $_POST["password"];
    $prenom = $_POST["prenom"];
    $nom  = $_POST["nom"];
    $mail = $_POST["mail"];

    if($code_produit == ""){
        $sql = "INSERT INTO utilisateur  VALUES ('$nom_utilisateur', '$motdepasse', '$prenom', '$nom', '$mail')";
        $conn->query($sql);
    }else{
        echo "Cet utilisateur exist déjà";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>INSCRIPTION </title>
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
            <a href="admin.php">
                <img src="admin.png" alt="Admin" style="width:20px;height:20px;border:0">
            </a>

        </div>


    </center>
</div>

<div>
    <center>
        <h2><b>Crée votre compte</b></h2>
    </center>

</div>

<!-- Partie où l on se crée un compte -->
<div id="creeVotreCompte">
    <center>
    <form action="verification.php" method="post">
    <br><br>
    <label><b>Nom d utilisateur</b></label>
    <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>
    <br><br>
    <label><b>Mot de passe</b></label>
    <input type="text" placeholder="Entrer le mot de passe" name="password" required>
    <br><br>
    <label><b>Prenom</b></label>
    <input type="text" placeholder="Entrer votre prenom" name="prenom" required>
    <br><br>
    <label><b>Nom</b></label>
    <input type="text" placeholder="Entrer votre Nom" name="nom" required>
    <br><br>
    <label><b>Mail</b></label>
    <input type="text" placeholder="Entrer votre mail" name="mail" required>
    <br><br>
    <input type="submit" id='submit' value='CREER' >

    </center>
</div>

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