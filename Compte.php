<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Votre compte</title>
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
        <h2><b>COMPTE</b></h2>
    </center>

</div>

<!-- Partie où on ce connecte ou l on se crée un compte -->
<div id="authentification">
    <center>
            <form action="verification.php" method="POST">
                <br>
                <h2>Connexion</h2>
                <br>
                <label><b>Nom d utilisateur</b></label>
                <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>
                <br><br>
                <label><b>Mot de passe</b></label>
                <input type="password" placeholder="Entrer le mot de passe" name="password" required>
                <br><br>
                <input type="submit" id='submit' value='LOGIN' >
                <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1 || $err==2)
                        echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                }
                ?>
            </form>


    <h3><a href="Create.php">Créez votre compte</a></h3>
    </center>
</div>


<?php include 'footer.php';?>