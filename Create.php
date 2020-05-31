<?php
include 'backend.php';

$id_utilisateur = "";
$nom_utilisateur = "";
$motdepasse = "";
$prenom = "";
$nom = "";
$mail = "";

$action= (isset ($_POST["action"])) ? $_POST["action"] : "";

//Nouveau enregistrement

if($action == "NEW"){
    $id_utilisateur = $_POST["id_utilisateur"];
    $nom_utilisateur = $_POST["nom_utilisateur"];
    $motdepasse = $_POST["motdepasse"];
    $prenom = $_POST["prenom"];
    $nom  = $_POST["nom"];
    $mail = $_POST["mail"];

    if($id_utilisateur == ""){
        $sql = "INSERT INTO utilisateur  VALUES (NULL, '$nom_utilisateur', '$motdepasse', '$prenom', '$nom', '$mail')";
        $conn->query($sql);
    }else{
             $sql = "update utilisateur set nom_utilisateur= '$nom_utilisateur',
                                       motdepasse = '$motdepasse',
                                       prenom = '$prenom'
                                       nom = '$nom',
                                       mail = '$mail'
                                       WHERE id_utilisateur = '$id_utilisateur' ";
             $conn->query($sql);
             $id_utilisateur = "";
             $nom_utilisateur = "";
             $motdepasse = "";
             $prenom = "";
             $nom = "";
             $mail = "";

         }
}

$sql = "select * from utilisateur";
$res = $conn->query($sql);
$lst_utilisateur = $res->fetchALL();



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

<br>
<div class= "container" id="creeVotreCompte">
<center><h2>Crée votre compte </h2></center>


<!-- Partie où l on se crée un compte -->

    <center>
   <tr>
    <form action=" " method="post">
    <input type="hidden"   name="action" value="NEW">
    <input type="hidden" name="id_utilisateur" id="id_utilisateur" value="<?php echo $id_utilisateur; ?>">
    <label><b>Nom d utilisateur</b></label>
    <input type="text" placeholder="Entrer le nom d'utilisateur" name="nom_utilisateur" value="<?php echo $nom_utilisateur; ?>">
    <br><br>
    <label><b>Mot de passe</b></label>
    <input type="text" placeholder="Entrer le mot de passe" name="motdepasse" value="<?php echo $motdepasse; ?>">
    <br><br>
    <label><b>Prenom</b></label>
    <input type="text" placeholder="Entrer votre prenom" name="prenom" value="<?php echo $prenom; ?>">
    <br><br>
    <label><b>Nom</b></label>
    <input type="text" placeholder="Entrer votre Nom" name="nom" value="<?php echo $nom; ?>">
    <br><br>
    <label><b>Mail</b></label>
    <input type="text" placeholder="Entrer votre mail" name="mail" value="<?php echo $mail; ?>">
    <br><br>
    <input type="submit" value="NEW">
    </form>
    </tr>

    <br><h3><a href="Compte.php">Entrer</a></h3>
    </center>


</div>
</center>

<?php include 'footer.php';?>